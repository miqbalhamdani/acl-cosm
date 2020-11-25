<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;

class ProductController extends Controller
{
    public function __construct(
        ProductRepository $product,
        BrandRepository $brand,
        CategoryRepository $category
    )
    {
        $this->model = $product;
        $this->brand = $brand;
        $this->category = $category;
        $this->title = 'Product';
        $this->path = env('PATH_PRODUCT');
        $this->temp = env('PATH_TEMP');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = [
            'perpage' => 20,
            'sort' => 'newest',
        ];

        $data = [
            'title' => $this->title,
            'collection' => $this->model->findWithPaginate($param),
        ];

        return view('admin.product.indexProduct', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = false)
    {
        $error_message  = false;
        $collection = null;

        if ($id) $collection = $this->model->find($id, 'id');

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'product_name' => 'bail|required',
                'brand' => 'bail|required',
                'category' => 'bail|required',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                $data = [
                    'name' => $request->input('product_name'),
                    'brand_id' => $request->input('brand'),
                    'category_id' => $request->input('category'),
                    'description' => $request->input('description'),
                    'variant_size' => $request->input('variant_size'),
                    'variants' => $request->input('variants'),
                    'is_active' => $request->input('is_active'),
                    'images' => $request->input('images'),
                ];

                if ($request->input('images')) {
                    $slug = ($id) ? $collection['slug'] : Str::slug($request->input('product_name'));

                    // move image from temp to gallery
                    $temp = public_path($this->temp) .'/';
                    $gallery = public_path($this->path) .'/'. $slug .'/';
                    $images = explode(',', $request->input('images'));
                    $sizeImages = explode(',', $request->input('sizeImages'));

                    // create image forlder
                    \File::exists($gallery) or \File::makeDirectory($gallery);

                    for ($i = 0; $i < count($images); $i++)
                    {
                        if(\File::isFile($temp . $images[$i]))
                        {
                            \File::move($temp . $images[$i], $gallery . $images[$i]);
                        }
                    }

                    for ($i = 0; $i < count($sizeImages); $i++)
                    {
                        if(\File::isFile($temp . $sizeImages[$i]))
                        {
                            \File::move($temp . $sizeImages[$i], $gallery . $sizeImages[$i]);
                        }
                    }
                }

                if ($id) {
                    $insert = $this->model->update($id, $data);
                    $message = 'Product successfully changed.';
                } else {
                    $data['slug'] = Str::slug($request->input('product_name'));
                    $insert = $this->model->create($data);
                    $message = 'Product successfully added.';
                }

                return redirect('/admin/product/')->with('success_message', $message);
            }
        }

        $data = [
            'title' => $this->title,
            'collection' => $collection,
            'brands' => $this->brand->get(),
            'categories' => $this->category->getMainCategory(),
            'error_message' => $error_message,
            'input' => $request->input(),
        ];

        return view('admin.product.formProduct', $data);
    }

    /**
     * Image Upload by dropzone
     *
     * @return void
     */
    public function uploadImage(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $path = public_path($this->temp);

        if ($name) {
            $name = $name .'.'. $image->getClientOriginalExtension();
        } else {
            $rand  = date('dmy.His') .'.'. uniqid();
            $name = strtoupper($rand) .'.'. $image->extension();
        }

        $image->move($path, $name);

        return \Response::json($name);
    }

    /**
     * Image remove by dropzone
     *
     * @return void
     */
    public function removeImage(Request $request)
    {
        $name = $request->name;
        $slug = $request->slug;

        $temp = public_path($this->temp);
        $path = public_path($this->path);

        if(\File::isFile($temp .'/'. $name)) {
            \File::delete($temp .'/'. $name);
        }

        if(\File::isFile($path .'/'. $slug .'/'. $name)) {
            \File::delete($path .'/'. $slug .'/'. $name);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE DIRECTORY
        $data = $this->model->find($id);
        $path = public_path($this->path) .'/'. $data->slug .'/';
        if (\File::exists($path)) {
            \File::deleteDirectory($path);
        }

        // DELETE DATA
        $this->model->destroy($id);

        return \Response::json();
    }
}

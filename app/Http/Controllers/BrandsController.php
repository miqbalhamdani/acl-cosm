<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\BrandRepository;

class BrandsController extends Controller
{
    public function __construct(
        BrandRepository $brand
    )
    {
        $this->model = $brand;
        $this->title = 'Brand';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => $this->title,
            'collection' => $this->model->get(),
        ];

        return view('admin.brand.indexBrand', $data);
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
                'brand_name' => 'bail|required',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                $data = [
                    'name' => $request->input('brand_name'),
                ];

                if ($id) {
                    $insert = $this->model->update($id, $data);
                    $message = 'Brand successfully changed.';
                } else {
                    $data['slug'] = Str::slug($request->input('brand_name'));
                    $insert = $this->model->create($data);
                    $message = 'Brand successfully added.';
                }

                // update brands cache
                $brands = $this->model->get();
                \Cache::put('product-brands', $brands);

                return redirect('/admin/brand/')->with('success_message', $message);
            }
        }

        $data = [
            'title' => $this->title,
            'collection' => $collection,
            'error_message' => $error_message,
            'input' => $request->input(),
        ];

        return view('admin.brand.formBrand', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->destroy($id);
        return \Response::json();
    }
}

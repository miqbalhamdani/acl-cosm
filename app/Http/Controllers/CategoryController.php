<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(
        CategoryRepository $category
    )
    {
        $this->model = $category;
        $this->title = 'Category';
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
            'collection' => $this->model->getMainCategory(),
        ];

        return view('admin.category.indexCategory', $data);
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
                'category_name' => 'bail|required',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                $data = [
                    'name' => $request->input('category_name'),
                    'parent_id' => $request->input('parent_id'),
                ];

                if ($id) {
                    $insert = $this->model->update($id, $data);
                    $message = 'Category successfully changed.';
                } else {
                    $data['slug'] = Str::slug($request->input('category_name'));
                    $insert = $this->model->create($data);
                    $message = 'Category successfully added.';
                }

                // update brands cache
                $categories = $this->model->get();
                \Cache::put('product-categories', $categories);

                return redirect('/admin/category/')->with('success_message', $message);
            }
        }

        $data = [
            'title' => $this->title,
            'collection' => $collection,
            'categories' => $this->model->getMainCategory(),
            'error_message' => $error_message,
            'input' => $request->input(),
        ];

        return view('admin.category.formCategory', $data);
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

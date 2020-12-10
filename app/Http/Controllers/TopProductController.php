<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\CustomRepository;
use App\Repositories\ProductRepository;

class TopProductController extends Controller
{
    public function __construct(
        CustomRepository $custom,
        ProductRepository $product
    )
    {
        $this->custom = $custom;
        $this->product = $product;
        $this->title = 'Top Product';
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
            'collection' => $this->custom->get(),
        ];

        return view('admin.top-product.indexTopProduct', $data);
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

        if ($id) $collection = $this->custom->find($id, 'id');

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required',
                'products' => 'bail|required',
                'sequence' => 'bail|required|integer',
                'is_active' => 'bail',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                $products = empty($request->input('products'))
                    ? $request->input('products')
                    : implode(",", $request->input('products'));
                $isActive = ($request->input('is_active') === "on") ? true : false;

                $data = [
                    'name' => $request->input('name'),
                    'products' => $products,
                    'type' => 'top-product',
                    'sequence' => (int) $request->input('sequence'),
                    'is_active' => $isActive,
                ];

                if ($id) {
                    $insert = $this->custom->update($id, $data);
                    $message = $this->title .' successfully changed.';
                } else {
                    $insert = $this->custom->create($data);
                    $message = $this->title .' successfully added.';
                }

                return redirect('/admin/top-product/')->with('success_message', $message);
            }
        }

        $data = [
            'title' => $this->title,
            'collection' => $collection,
            'products' => $this->product->get(),
            'error_message' => $error_message,
            'input' => $request->input(),
        ];

        return view('admin.top-product.formTopProduct', $data);
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

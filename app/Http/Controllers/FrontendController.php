<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class FrontendController extends Controller
{
    public function __construct(
        ProductRepository $product
    )
    {
        $this->model = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $param = [
            'perpage' => 1,
            'sort' => 'newest',
        ];

        $data = [
            'categories' => \Cache::get('product-categories'),
            'brands' => \Cache::get('product-brands'),
            'collection' => $this->model->findWithPaginate($param),
        ];

        return view('pages.list', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($slug)
    {
        $product = $this->model->findBySlug($slug);
        // if (!$product) return view('errors.404');

        $data = [
            'og_title' => $product->name,
            'og_description' => "Get high quality bedding set only with ". $product->price_format,
            'og_url' => $product->url,
            'og_image' => $product->photo_url,
            'product' => $product,
        ];

        return view('pages.detail', $data);
    }
}

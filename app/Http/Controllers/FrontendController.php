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
    public function companyProfile()
    {
        $breadcrumbs = [
            'Home',
            'About Us',
        ];

        $data = [
            'title' => 'About Us',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('pages.company-profile', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sertifikat()
    {
        return view('pages.sertifikat');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function layanan()
    {
        $breadcrumbs = [
            'Home',
            'Services',
        ];

        $data = [
            'title' => 'Services',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('pages.layanan', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $breadcrumbs = [
            'Home',
            'Contact us',
        ];

        $data = [
            'title' => 'Contact',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('pages.contact', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $breadcrumbs = [
            'Home',
            'Products',
        ];

        $param = [
            'perpage' => 20,
            'sort' => 'newest',
        ];

        $data = [
            'title' => 'Products',
            'breadcrumbs' => $breadcrumbs,
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

        $breadcrumbs = [
            'Home',
            'Products',
            $product->name,
        ];

        $data = [
            'title' => 'Products',
            'breadcrumbs' => $breadcrumbs,
            'og_title' => $product->name,
            'og_description' => "Get high quality bedding set only with ". $product->price_format,
            'og_url' => $product->url,
            'og_image' => $product->photo_url,
            'product' => $product,
        ];

        return view('pages.detail', $data);
    }
}

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
        $title = 'Company Profile';

        $breadcrumbs = [
            'Home',
            $title,
        ];

        $data = [
            'title' => $title,
            'og_title' => $title,
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
        $title = 'Sertifikasi';

        $breadcrumbs = [
            'Home',
            $title,
        ];

        $data = [
            'title' => $title,
            'og_title' => $title,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('pages.sertifikat', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function layanan()
    {
        $title = 'Layanan';

        $breadcrumbs = [
            'Home',
            $title,
        ];

        $data = [
            'title' => $title,
            'og_title' => $title,
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
    public function list(Request $request)
    {
        $breadcrumbs = [
            'Home',
            'Products',
        ];

        $param = [
            'perpage' => 20,
            'sort' => 'newest',
            'category' => $request->input('category'),
            'brands' => $request->input('brands'),
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
            'og_description' => $product->description,
            'og_url' => $product->url,
            'og_image' => $product->first_photo,
            'product' => $product,
            'related_product' => $this->model->getRelatedProduct($product->id),
        ];

        return view('pages.detail', $data);
    }
}

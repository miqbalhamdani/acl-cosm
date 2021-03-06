<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AskQuestion;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomRepository;
use App\Repositories\AskQuestionRepository;

class FrontendController extends Controller
{
    public function __construct(
        ProductRepository $product,
        CategoryRepository $category,
        CustomRepository $custom,
        AskQuestionRepository $askQuestion
    )
    {
        $this->model = $product;
        $this->category = $category;
        $this->custom = $custom;
        $this->askQuestion = $askQuestion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'topProducts' => $this->custom->topProduct(),
        ];

        return view('pages.home', $data);
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
    public function contact(Request $request)
    {
        $breadcrumbs = [
            'Home',
            'Contact us',
        ];

        if ($request->isMethod('post')) {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'title' => $request->input('title'),
                'message' => $request->input('message'),
            ];

            $insert = $this->askQuestion->create($data);

            // \Mail::to('iqbal.hamdani@misteraladin.com')
            //     ->send(new AskQuestion($payload));

            return redirect('/contact/')
                ->with('success_message', 'Pesan berhasil di kirimkan.');
        }

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
            'name' => $request->input('search'),
            'category' => $request->input('category'),
            'brands' => $request->input('brands'),
        ];

        $data = [
            'title' => 'Products',
            'breadcrumbs' => $breadcrumbs,
            'categories' => \Cache::get('product-categories'),
            'brands' => \Cache::get('product-brands'),
            'collection' => $this->model->findWithPaginate($param),
            'input' => $request->input(),
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
        if (!$product) return view('errors.404');

        // Get Parent Category
        $category = $this->category->find($product->category->parent_id);

        $breadcrumbs = [
            'Home',
            'Products',
            @$category->name,
            $product->category->name,
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

<?php namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Repositories\AbstractRepository;
use App\Repositories\Contracts\ProductInterface;

class ProductRepository extends AbstractRepository implements ProductInterface
{
    public function __construct(
        Product $product,
        Category $category,
        Brand $brand
    )
    {
        $this->model = $product;
        $this->category = $category;
        $this->brand = $brand;
    }

    /**
    * Get list with filter and paginate
    *
    * @param array $param
    * @return Object
    */
    public function findWithPaginate(array $param)
    {
        $perpage = $param['perpage'] ?? 20;
        $category = $param['category'] ?? '';
        $brands = $param['brands'] ?? '';
        $sort = $param['sort'] ?? '';
        $name = $param['name'] ?? '';

        $data = $this->model;

        if (!empty($category)) {
            $categories = $this->category->where('slug', $category)->first();
            $categoriesId = $categories->id ?? 0;
            $data = $data->where('category_id', $categoriesId);
        }

        if (!empty($brands)) {
            $arrBrands = explode(",", $brands);
            $dataBrands = $this->brand->whereIn('slug', $arrBrands)->get();

            $arrBrands = $dataBrands->map(function ($item) {
                return $item->id;
            });
            $data = $data->whereIn('brand_id', $arrBrands);
        }

        if (!empty($name)) {
            $data = $data->where('name', 'like', '%'. $name .'%');
        }

        if (!empty($sort) & $sort == "newest") {
            $data = $data->orderBy('created_at', 'DESC');
        }

        if (!empty($sort) & $sort == "highest") {
            $data = $data->orderBy('lowest_price', 'DESC');
        }

        if (!empty($sort) & $sort == "lowest") {
            $data = $data->orderBy('lowest_price', 'ASC');
        }

        $data = $data->paginate($perpage);

        if (!empty($category)) {
            $data->appends([
                'category' => $category,
            ]);
        }

        if (!empty($brands)) {
            $data->appends([
                'brands' => $brands,
            ]);
        }

        if (!empty($name)) {
            $data->appends([
                'name' => $name,
            ]);
        }

        if (!empty($sort)) {
            $data->appends([
                'sort' => $sort,
            ]);
        }

        return $data;
    }

    /**
    * Get detail product by slug
    *
    * @param String $slug
    * @return Object
    */
    public function findBySlug($slug)
    {
        return $this->model
            ->where('slug', $slug)
            ->first();
    }

    /**
    * Get all relatetd product
    * filter by category
    *
    * @param String $slug
    * @return Object
    */
    public function getRelatedProduct($product_id)
    {
        $product = $this->model->find($product_id);

        return $this->model
            ->where('category_id', $product->category_id)
            ->where('id', '<>', $product_id)
            ->inRandomOrder()
            ->get();
    }
}

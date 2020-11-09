<?php namespace App\Repositories;

use App\Models\Product;
use App\Repositories\AbstractRepository;
use App\Repositories\Contracts\ProductInterface;

class ProductRepository extends AbstractRepository implements ProductInterface
{
    public function __construct(Product $product)
    {
        $this->model = $product;
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
        $sort = $param['sort'] ?? '';
        $name = $param['name'] ?? '';

        $data = $this->model;

        if (!empty($category)) {
            $categories = $this->category->where('slug', $category)->first();
            $categoriesId = $categories->id ?? 0;
            $data = $data->where('category_id', $categoriesId);
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

        return $data;
    }
}

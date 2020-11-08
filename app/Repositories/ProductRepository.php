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
}

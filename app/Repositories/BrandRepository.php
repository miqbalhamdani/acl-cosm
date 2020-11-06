<?php namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\AbstractRepository;
use App\Repositories\Contracts\BrandInterface;

class BrandRepository extends AbstractRepository implements BrandInterface
{
    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }
}

<?php namespace App\Repositories;

use App\Models\Custom;
use App\Repositories\AbstractRepository;
use App\Repositories\Contracts\CustomInterface;

class CustomRepository extends AbstractRepository implements CustomInterface
{
    public function __construct(Custom $custom)
    {
        $this->model = $custom;
    }

    /**
    * Get top product [Homepage]
    *
    * @return Array
    */
    public function topProduct()
    {
        return $this->model
            ->where('type', 'top-product')
            ->where('is_active', 1)
            ->orderBy('sequence')
            ->limit(4)
            ->get();
    }
}

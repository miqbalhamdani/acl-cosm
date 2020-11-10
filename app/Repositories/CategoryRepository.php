<?php namespace App\Repositories;

use App\Models\Category;
use App\Repositories\AbstractRepository;
use App\Repositories\Contracts\CategoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
    * Get main category list
    *
    * @return Array
    */
    public function getMainCategory()
    {
        return $this->model
            ->whereNull('parent_id')
            ->get();
    }
}

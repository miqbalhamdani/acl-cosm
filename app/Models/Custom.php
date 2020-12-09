<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Custom extends Model
{
    use SoftDeletes;

    /**
    * The collection associated with the model.
    *
    * @var string
    */
    protected $collection = 'customs';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['id'];

    /**
    * Attributes that are primary field.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['created_at', 'updated_at'];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'product',
    ];

    /**
     * Get the product.
     */
    public function Product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }


    /**
    * The attributes that are appends.
    *
    * @var array
    */
    protected $appends = [
        'is_active_html',
        'list_product',
    ];

    /**
    * Get Unit Kerja from db units.
    *
    * @return string
    */
    public function getListProductAttribute()
    {
        $list = explode(",", $this->products);
        return Product::whereIn('id', $list)->get();
    }

    /**
    * First Photo
    *
    * @return String
    */
    public function getIsActiveHtmlAttribute()
    {
        if ($this->is_active) {
            return '<div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Active</div>';
        }

        return '<div class="badge badge-pill badge-glow badge-danger mb-1">Inactive</div>';
    }
}

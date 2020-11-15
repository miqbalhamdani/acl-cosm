<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
    * The collection associated with the model.
    *
    * @var string
    */
    protected $collection = 'products';

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
        'brand',
        'category',
    ];

    /**
     * Get the category for the product.
     */
    public function Brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }

    /**
     * Get the category for the product.
     */
    public function Category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }


    /**
    * The attributes that are appends.
    *
    * @var array
    */
    protected $appends = [
        'all_photos',
        'url',
    ];

    /**
    * All photos from photo and photo in variants
    *
    * @return String
    */
    public function getAllPhotosAttribute()
    {
        $images = explode(',', $this->images);
        $imagesCollection = collect($images);

        $variants = json_decode($this->variants);
        $variantsCollection = collect($variants)
            ->map(function ($variant) {
                if (!@$variant->image) return '';
                return $variant->image;
            })
            ->filter(function ($variant) {
                return $variant != '';
            });

        $merged = $imagesCollection->merge($variantsCollection);
        return $merged->all();
    }

    /**
    * Product Url
    *
    * @return String
    */
    public function getUrlAttribute()
    {
        return route('product-detail', ['slug' => $this->slug]);
    }
}

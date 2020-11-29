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
        'variants_collection',
        'first_variants',
        'second_variants',
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
    * Get json variants
    *
    * @return Array
    */
    public function getVariantsCollectionAttribute()
    {
        if (!$this->variants) return;
        return json_decode($this->variants);
    }

    /**
    * Get half variant lenght
    *
    * @return Integer
    */
    public function halfVariants()
    {
        return ceil($this->totalVariants() / 2);
    }

    /**
    * Get total variant lenght
    *
    * @return Integer
    */
    public function totalVariants()
    {
        return count($this->variants_collection);
    }

    /**
    * Get first variant
    *
    * @return Array
    */
    public function getFirstVariantsAttribute()
    {
        $collection = collect($this->variants_collection);
        $chunk = $collection->splice(0, $this->halfVariants());
        return $chunk->all();
    }

    /**
    * Get second variant
    *
    * @return Array
    */
    public function getSecondVariantsAttribute()
    {
        $collection = collect($this->variants_collection);
        $chunk = $collection->splice($this->halfVariants(), $this->totalVariants());
        return $chunk->all();
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

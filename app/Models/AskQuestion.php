<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AskQuestion extends Model
{
    use SoftDeletes;

    /**
    * The collection associated with the model.
    *
    * @var string
    */
    protected $collection = 'categories';

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
    * The attributes that are appends.
    *
    * @var array
    */
    protected $appends = [
        'status_html',
    ];

    /**
    * Get Unit Kerja from db units.
    *
    * @return string
    */
    public function getStatusHtmlAttribute()
    {
        if ($this->status != 1) {
            return '<div class="badge badge-pill badge-light-secondary mr-1">belum dibaca</div>';
        }

        return '<div class="badge badge-pill badge-light-success mr-1">telah dibaca</div>';
    }
}

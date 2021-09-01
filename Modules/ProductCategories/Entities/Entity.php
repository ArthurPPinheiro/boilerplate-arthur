<?php

namespace Modules\ProductCategories\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'description' ];

    protected $table = 'product_categories';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Entity $item) {

        });

        static::deleting(function (Entity $item) {


        });

    }
}

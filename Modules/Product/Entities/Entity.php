<?php

namespace Modules\Product\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Entity extends Model implements HasMedia
{
    use InteractsWithMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'sku', 'stock', 'price', 'slug', 'description', 'status', 'weight', 'width', 'height', 'length', 'category_id' ];

    protected $table = 'products';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Entity $item) {

        });

        static::deleting(function (Entity $item) {


        });

    }
}

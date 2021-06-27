<?php

namespace Modules\Teste3\Entities;

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
    protected $fillable = [ 'teste' ];

    protected $table = 'teste3';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Entity $item) {

        });

        static::deleting(function (Entity $item) {


        });

    }
}

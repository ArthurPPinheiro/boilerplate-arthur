<?php

namespace Modules\Teste2\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste2 extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'email' ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Teste2 $item) {

        });

        static::deleting(function (Teste2 $item) {


        });

    }
}

<?php

namespace Modules\Todo\Entities;

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
    protected $fillable = [ 'titulo', 'descricao' ];

    protected $table = 'todos';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Entity $item) {

        });

        static::deleting(function (Entity $item) {


        });

    }

}

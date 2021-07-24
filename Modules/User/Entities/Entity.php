<?php

namespace Modules\User\Entities;

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
    protected $fillable = [ 'name', 'email', 'is_admin' ];

    protected $table = 'users';

    protected $hidden = ['password', 'email_verified_at'];

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Entity $item) {

        });

        static::deleting(function (Entity $item) {


        });

    }
}

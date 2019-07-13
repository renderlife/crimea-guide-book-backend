<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Routing\Route;
use phpDocumentor\Reflection\Types\Integer;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'email'             => 'string',
        'password'          => 'string',
        'isAdmin'           => 'boolean',
        'remember_token'    => 'string',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

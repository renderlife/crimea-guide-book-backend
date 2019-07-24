<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'coordinate',
        'city_id',
        'street',
        'house',
        'place',
        'short_text',
        'full_text',
        'picture_cover',
        'author',
        'code',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
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
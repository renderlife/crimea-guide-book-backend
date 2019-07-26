<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRelPoint extends Model
{
    protected $table = 'category_points';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'point_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

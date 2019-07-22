<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 */
class CategoryPoint extends Model
{
    protected $table = 'categories_for_points';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'name_s',
        'code',
        'description',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

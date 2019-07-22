<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
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

    protected function FunctionName($value='')
    {
    	# code...
    }
}

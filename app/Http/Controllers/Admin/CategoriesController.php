<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        return true;
    }

    //
    public function addCategory()
    {
        return view('admin.categories.index');
    }
    
    //
    public function editCategory(int $id)
    {
        return true;
    }

    //
    public function deleteCategory(int $id)
    {
        return true;
    }

}

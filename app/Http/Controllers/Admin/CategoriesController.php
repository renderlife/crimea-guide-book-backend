<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        return view('admin.categories.index');
    }

    //
    public function addCategory()
    {
        return view('admin.categories.add');
    }
    
    //
    public function addRequestCategory(Request $request)
    {
        $objCategory = new Category();
        dd($request->all());
    }
    
    //
    public function editCategory(int $id)
    {
        return view('admin.categories.add');
    }

    //
    public function deleteCategory(int $id)
    {
        return view('admin.categories.index');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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
        try {
            $this->validate($request, [
                'name_cat'  => 'required|unique:categories,name|string|min:1|max:255',
                'code'  => 'required|unique:categories,code|alpha_dash|min:1|max:20',
            ]);
            $objCategory = new Category();
            $objCategory = $objCategory->create([
                'name'          => $request->input('name_cat'),
                'code'          => $request->input('code'),
                'description'   => $request->input('description'),
            ]);
            if ($objCategory) {
                return back()->with('success', trans('messages.admin.categorySuccessAdd'));
            } else {
                return back()->with('error', trans('messages.admin.categoryErrorAddValid'));
            }
        } catch (ValidationException $e) {
            Log::error($e->getMessage());
            return back()->with('error', trans('messages.admin.categoryErrorAdd') . $e->getMessage());
        }
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

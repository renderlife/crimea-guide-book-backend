<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryPoint;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CategoriesPointsController extends Controller
{
    //
    public function index()
    {
        return view('admin.categories-points.index');
    }

    //
    public function addCategory(Request $request)
    {
        return view('admin.categories-points.add');
    }
    
    //

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRequestCategory(Request $request)
    {
        try {
            $this->validate($request, [
                'name_cat'  => 'required|unique:categories_for_points,name|string|min:1|max:255',
                'code'      => 'required|unique:categories_for_points,code|alpha_dash|min:1|max:20',
            ]);
            $objCategory = new CategoryPoint();
            $objCategory = $objCategory->create([
                'name'          => $request->input('name_cat'),
                'name_s'        => $request->input('name_cat_s'),
                'code'          => $request->input('code'),
                'description'   => $request->input('description'),
            ]);
            if ($objCategory) {
                return back()->with('success', trans('messages.admin.categorySuccessAdd'));
            } else {
                return back()->with('error', trans('messages.admin.categoryErrorAddValid'));
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error($e->getMessage());
            return back()->with('error', trans('messages.admin.categoryErrorAdd') . ' ' . $e->getMessage());
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

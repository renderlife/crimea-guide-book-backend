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
        $objCategory = new Category();
        $categories = $objCategory->get();

        return view('admin.categories.index', ['categoties' => $categories]);
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
                return redirect()->route('categories')->with('success', trans('messages.admin.categorySuccessAdd'));
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
        $objCategory = new Category();
        $category = $objCategory->find($id);

        if (empty($category)) {
            return abort(404);
        }

        return view('admin.categories.edit', ['category' => $category]);
    }
    
    //
    public function editRequestCategory(Request $request, int $id)
    {
        try {
            /*$this->validate($request, [
                'name_cat'  => 'required|unique:categories_for_points,name|string|min:1|max:255',
                'code'      => 'required|unique:categories_for_points,code|alpha_dash|min:1|max:20',
            ]);*/
            $objCategory = new Category();
            $objCategory = $objCategory->find($id);

            if (empty($objCategory)) {
                return abort(404);
            } else {
                $objCategory->name = $request->input('name_cat');
                $objCategory->code = $request->input('code');
                $objCategory->description = $request->input('description');

                if ($objCategory->save()) {
                    return redirect()->route('categories')->with('success', trans('messages.admin.categorySuccessUpdate'));
                }
            }

            return back()->with('error', trans('messages.admin.categoryErrorAddValid'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error($e->getMessage());
            return back()->with('error', trans('messages.admin.categoryErrorUpdate') . ' ' . $e->getMessage());
        }
    }

    //
    public function deleteCategory(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objCategory = new Category();
            $objCategory->where('id', $id)->delete();

            echo 'success';
        }
    }

}

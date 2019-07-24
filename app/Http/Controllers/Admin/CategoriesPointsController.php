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
        $objCategory = new CategoryPoint();
        $categories = $objCategory->get();

        return view('admin.categories-points.index', ['categoties' => $categories]);
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
                return redirect()->route('categories-points')->with('success', trans('messages.admin.categorySuccessAdd'));
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
        $objCategory = new CategoryPoint();
        $category = $objCategory->find($id);

        if (empty($category)) {
            return abort(404);
        }

        return view('admin.categories-points.edit', ['category' => $category]);
    }

    public function editRequestCategory(Request $request, int $id)
    {
        try {
            $this->validate($request, [
                'name_cat'  => 'required|unique:categories_for_points,name,' . $id . '|string|min:1|max:255',
                'code'      => 'required|unique:categories_for_points,code,' . $id . '|alpha_dash|min:1|max:20',
            ]);
            $objCategory = new CategoryPoint();
            $objCategory = $objCategory->find($id);

            if (empty($objCategory)) {
                return abort(404);
            } else {
                $objCategory->name = $request->input('name_cat');
                $objCategory->name_s = $request->input('name_cat_s');
                $objCategory->code = $request->input('code');
                $objCategory->description = $request->input('description');

                if ($objCategory->save()) {
                    return redirect()->route('categories-points')->with('success', trans('messages.admin.categorySuccessUpdate'));
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
            $objCategory = new CategoryPoint();
            $objCategory->where('id', $id)->delete();

            echo 'success';
        }
    }

}

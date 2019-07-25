<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryPoint;
use App\Models\Point;
use Illuminate\Http\Request;
use App\Http\Requests\PointRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class PointsController extends Controller
{
    public function index()
    {
        $objPoint = new Point();
        $points = $objPoint->get();

        foreach ($points as &$point) {
            $point['city'] = $point['city_id'];
        }

        return view('admin.points.index', ['points' => $points]);
    }

    public function addPoint()
    {
        $objCategories = new CategoryPoint();
        $categories = $objCategories->get();

        $cities = [
            0 => ['id' => 1, 'name' => 'Ялта'],
            1 => ['id' => 2, 'name' => 'Алушта'],
            2 => ['id' => 3, 'name' => 'Севастополь'],
        ];

        return view('admin.points.add', ['categories' => $categories, 'cities' => $cities]);
    }

    public function addRequestPoint(PointRequest $request)
    {
        $objPoint = new Point();
        $objPoint = $objPoint->create([
            'title'         => $request->input('title'),
            'code'          => $request->input('code'),
            'street'        => $request->input('street'),
            'city_id'       => $request->input('city'),
            'house'         => $request->input('house'),
            'place'         => $request->input('place'),
            'full_text'     => $request->input('full_text'),
            'short_text'    => $request->input('short_text'),
            'picture_cover' => $request->input('picture_cover'),
            'author'        => $request->input('author'),
        ]);
        if ($objPoint) {
            return redirect()->route('points')->with('success', trans('messages.admin.pointSuccessAdd'));
        } else {
            return back()->with('error', trans('messages.admin.pointErrorAddValid'));
        }
    }

    public function editPoint(int $id)
    {
        $objPoint = new Point();
        $point = $objPoint->find($id);

        if (empty($point)) {
            return abort(404);
        }

        $point['city'] = $point['city_id'];
        //$point['category'] = $point['category'];

        return view('admin.points.edit', ['point' => $point]);
    }

    public function editRequestPoint(Request $request, int $id)
    {
        try {
            $this->validate($request, [
                'title' => 'required|unique:points,title,' . $id . '|string|min:1|max:255',
                'code'  => 'required|unique:points,code,' . $id . '|alpha_dash|min:1|max:50',
            ]);
            $objPoint = new Point();
            $objPoint = $objPoint->find($id);

            if (empty($objPoint)) {
                return abort(404);
            } else {
                $objPoint->title         = $request->input('title');
                $objPoint->code          = $request->input('code');
                $objPoint->street        = $request->input('street');
                $objPoint->city_id       = $request->input('city');
                $objPoint->house         = $request->input('house');
                $objPoint->place         = $request->input('place');
                $objPoint->full_text     = $request->input('full_text');
                $objPoint->short_text    = $request->input('short_text');
                $objPoint->picture_cover = $request->input('picture_cover');
                $objPoint->author        = $request->input('author');

                if ($objPoint->save()) {
                    return redirect()->route('points')->with('success', trans('messages.admin.pointSuccessUpdate'));
                }
            }

            return back()->with('error', trans('messages.admin.pointErrorAddValid'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error($e->getMessage());
            return back()->with('error', trans('messages.admin.pointErrorUpdate') . ' ' . $e->getMessage());
        }
    }

    public function deletePoint(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objPoint = new Point();
            $objPoint->where('id', $id)->delete();

            echo 'success';
        }
    }
}

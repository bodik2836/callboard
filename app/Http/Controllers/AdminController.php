<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $categories = Category::all();
        $categoryLink = 'active';

        return view('admin.category_all', [
            'categories' => $categories,
            'categoryLink' => $categoryLink
        ]);
    }

    public function adverts()
    {
        $adverts= Advert::all();
        $advertLink = 'active';

        return view('admin.advert_all', [
            'adverts' => $adverts,
            'advertLink' => $advertLink
        ]);
    }

    public function addCategory(Request $request)
    {
        if ($request->has('name')) {
            $category = new Category();
            $category->name = $request->input('name');
            $category->save();

            return redirect('admin');
        }

        return view('admin.category_add');
    }

    public function editCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if ($request->has('name')) {
            $category->name = $request->input('name');
            $category->save();

            return redirect('admin');
        }

        return view('admin.category_edit', [
            'category' => $category
        ]);
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();

        return redirect('admin');
    }

    public function editAdvert(Request $request, $id)
    {
        $advert = Advert::findOrFail($id);

        if ($request->has('title') && $request->has('description')) {
            $advert->title = $request->input('title');
            $advert->description = $request->input('description');
            $advert->save();

            return redirect('admin/advert/all');
        }

        return view('admin.advert_edit', [
            'advert' => $advert
        ]);
    }

    public function deleteAdvert($id)
    {
        Advert::find($id)->delete();

        return redirect('admin/advert/all');
    }
}

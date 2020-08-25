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

        return view('admin.admin', [
            'categories' => $categories,
            'categoryLink' => $categoryLink
        ]);
    }

    public function adverts()
    {
        $adverts= Advert::all();
        $advertLink = 'active';

        return view('admin.adverts', [
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
}

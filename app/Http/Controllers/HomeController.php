<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();

        return view('home.welcome', [
            'categories' => $categories
        ]);
    }

    public function getAdverts($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);

        return view('home.adverts', [
            'categories' => $categories,
            'adverts' => $category->adverts()->orderBy('updated_at', 'desc')->get(),
            'active_id' => $id
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        $adverts = Advert::orderBy('updated_at', 'desc')->limit(10)->get();

        return view('home.welcome', [
            'categories' => $categories,
            'adverts' => $adverts
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

    public function addAdvert(Request $request)
    {
        if (
            $request->has('title') &&
            $request->has('description') &&
            $request->has('category_id')
        ) {
            $advert = new Advert();
            $advert->title = $request->input('title');
            $advert->description = $request->input('description');
            $advert->category_id = $request->input('category_id');
            $advert->save();
        }

        return redirect('/');
    }
}

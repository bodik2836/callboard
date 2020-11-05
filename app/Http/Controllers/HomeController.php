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
        $title = 'Головна';

        return view('home.welcome', [
            'categories' => $categories,
            'adverts' => $adverts,
            'title' => $title
        ]);
    }

    public function getAdverts($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $title = $category->name;

        return view('home.adverts', [
            'categories' => $categories,
            'adverts' => $category->adverts()->orderBy('updated_at', 'desc')->get(),
            'active_id' => $id,
            'title' => $title
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

            if ($advert->save()) {
                $request->session()->flash('status', [
                    'msg' => 'Оголошення успішно додане.',
                    'type' => 'success'
                ]);
            } else {
                $request->session()->flash('status', [
                    'msg' => 'Сталася помилка. Оголошення не додане.',
                    'type' => 'error'
                ]);
            }
        }

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AlbumPhoto;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AlbumPageController extends Controller
{
    public function index()
    {
        $photos = AlbumPhoto::get();
        return Inertia::render("AlbumPage", ["photos" => $photos]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'photo' => 'required|image|max:2048'
        ], [
            'title.required' => 'Поле Название обязательно для заполнения.',
            'photo.required' => 'Поле Фото обязательно для заполнения',
            'photo.image' => 'Поле Фото должно содержать изображение',
            'photo.max' => 'Слишком большой размер файла',
        ]);

        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('/img'), $filename);

        $basePath = asset('img');
        $url = $basePath . "/$filename";

        AlbumPhoto::create([
            'title' => $validated['title'],
            'alt' => $validated['title'],
            'path' => $url
        ]);

        return to_route('album.index');
    }
}

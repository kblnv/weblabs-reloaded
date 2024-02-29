<?php

namespace App\Http\Controllers;

use App\Models\AlbumPhoto;
use Inertia\Inertia;

class AlbumPageController extends Controller
{
    public function index()
    {
        $photos = AlbumPhoto::get();
        return Inertia::render("AlbumPage", ["photos" => $photos]);
    }
}
    
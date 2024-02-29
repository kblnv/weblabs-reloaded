<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Inertia\Inertia;

class InterestsPageController extends Controller
{
    public function index()
    {
        $interests = Interest::get();
        return Inertia::render("InterestsPage", ["interests" => $interests]);
    }
}

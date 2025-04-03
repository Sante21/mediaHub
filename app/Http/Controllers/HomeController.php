<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;
use App\Models\Media;
use App\Models\User;

class HomeController extends Controller
{
    function home() {
        $platforms = Platform::all();
        $medias = Media::all();
        $users = User::all();
        return view('home', compact('platforms', 'medias', 'users'));
    }
}

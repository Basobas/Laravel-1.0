<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;



class SearchController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $images = Image::all();
            $images = $images->sortByDesc('likes');

            return view('pages.images')->with('images', $images);

        } else {
            return view('auth.login');
        }
    }
}

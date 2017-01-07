<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\Auth;


class ImagesController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $images = Image::all();

            return view('pages.images')->with('images', $images);

        } else {
            return view('auth/login');
        }
    }
    public function edit()
    {
        if (Auth::check()) {
            return view('pages.upload');

        } else {
            return view('auth/login');
        }
    }


    public function store(Request $request)
    {


        DB::table('images')->insert(
            ['user_id' => 1, 'name' => $request->title, 'author' => $request->author, 'details' => '', 'image_url' => $request->image_url]
        );

        return view('pages.upload');
    }
}

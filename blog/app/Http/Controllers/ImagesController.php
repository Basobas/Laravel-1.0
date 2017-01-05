<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ImagesController extends Controller
{
    public function index()
    {
        $images = DB::table('images')->get();

        return view('pages.images', compact('images'));
    }

    public function create()
    {
        return view('pages.images');
    }

    public function store()
    {

    }

}

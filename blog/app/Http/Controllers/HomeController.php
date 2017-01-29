<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;



class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $images = DB::table('images')->where('active', '1')->paginate(3);

        $abstracts = DB::table('images')->where([
            ['active', '=', '1'],
            ['category', '=', 'Abstract']
        ])->paginate(3);

        $arts = DB::table('images')->where([
            ['active', '=', '1'],
            ['category', '=', 'Art']
        ])->paginate(3);

        $animals = DB::table('images')->where([
            ['active', '=', '1'],
            ['category', '=', 'Animals']
        ])->paginate(3);

        $natures = DB::table('images')->where([
            ['active', '=', '1'],
            ['category', '=', 'Nature']
        ])->paginate(3);

        $technologys = DB::table('images')->where([
            ['active', '=', '1'],
            ['category', '=', 'Technology']
        ])->paginate(3);

        return view('home')->with(compact('images', 'abstracts', 'arts', 'animals', 'natures', 'technologys'));
    }

}

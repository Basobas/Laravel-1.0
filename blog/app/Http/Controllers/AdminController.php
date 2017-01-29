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



class AdminController extends Controller
{
    public function index()
    {
       $user = Auth::user();
        if (Auth::check() && $user->admin == 1) {


            $users = DB::table('users')->get();

            return view('admin.control')->with('users', $users);
        } else {
            return view('auth.login');
        }
    }

}
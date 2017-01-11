<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\Like;



class ImagesController extends Controller
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

    public function imageDetails($imageId){

        if (Auth::check()) {

            $image = DB::table('images')->where('id', '=', $imageId)->first();

            return view('pages.details')->with('image', $image);

        } else {
            return view('auth.login');
        }

    }

    public function userImages(){
        if (Auth::check()) {

            $user = Auth::user();
            $userImages = $user->images()->where('user_id', $user->id)->get();

            return view('pages.myimages')->with('images', $userImages);

        } else {
            return view('auth.login');
        }
    }

    public function edit()
    {
        if (Auth::check()) {
            return view('pages.upload');

        } else {
            return view('auth.login');
        }
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        DB::table('images')->insert(
            ['user_id' => $user->id, 'name' => $request->title, 'author' => $user->name, 'details' => $request->description, 'image_url' => $request->image_url, 'likes' => 0, 'category' => $request->category, 'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()]
        );

        return view('pages.upload');
    }


    public function imageLike(Request $request)
    {
        $image_id = $request['imageId'];
        $liked = $request['liked'];
        $image = Image::find($image_id);
        $update = false;
        $total = $image->likes;


        if(!$image){
            return "geen image";
        }
        $user = Auth::user();
        $like = $user->likes()->where('image_id', $image_id)->first();

        if($like){
            $update = true;
            $already_like = $like->like;
            if ($already_like == $liked){
                $like->delete();
                if($liked == 'like'){
                    $image->likes = $total -1;
                    $image->update();
                }
                else{
                    $image->likes = $total +1;
                    $image->update();
                }
                return null;
            }
            else{
                if($liked == 'like'){
                    $image->likes = $total +2;
                    $image->update();
                }
                else{
                    $image->likes = $total -2;
                    $image->update();
                }
            }
        }else{
            $like = new Like();

        }
        $like->like = $liked;
        $like->user_id = $user->id;
        $like->image_id = $image->id;

        if($update){
            $like->update();
        }else{
            $like->save();
            if($liked == 'like'){
                $image->likes = $total +1;
                $image->update();
            }
            else{
                $image->likes = $total -1;
                $image->update();
            }

        }
        return "updated of nieuwe aangemaakt";
    }

}




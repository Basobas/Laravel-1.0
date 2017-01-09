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
        $user = Auth::user();

        DB::table('images')->insert(
            ['user_id' => $user->id, 'name' => $request->title, 'author' => $request->author, 'details' => $request->description, 'image_url' => $request->image_url, 'likes' => '']
        );

        return view('pages.upload');
    }


    public function imageLike(Request $request)
    {
        $image_id = $request['imageId'];
        $liked = $request['liked'];
        $image = Image::find($image_id);
        $update = false;
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

                return "nee";
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
        }
        return "updated of nieuwe aangemaakt";
    }
//
//        $likeNow = DB::table('likes')->where([
//            ['user_id', '=', $UserId],
//            ['image_id', '=', $image_id]
//        ])->select('like')->get()->first();
//
//        if (!$likeNow) {
//            DB::table('likes')->insert(
//                ['user_id' => $UserId, 'image_id' => $image_id, 'like' => $liked]
//            );
//
//            return $liked;
//        }
//        else if ($likeNow->like == $liked) {
//            DB::table('likes')->where([
//                ['user_id', '=', $UserId],
//                ['image_id', '=', $image_id]
//            ])->delete();
//            $liked = 'default';
//            return $liked;
//        }
//
//        else {
//            DB::table('likes')->where([
//                ['user_id', '=', $UserId],
//                ['image_id', '=', $image_id]
//            ])->update(array('like' => $liked));
//            return $liked;
//
//        }
//    }
}




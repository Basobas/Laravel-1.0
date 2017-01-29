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



class ImagesController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userimages = DB::table('images')->where('user_id', '=', $user->id)->get();
            $amountimages = count($userimages);

            $query = $request['search'];
            $query2 = $request['category'];

            if ($query2 == '') {
                $images = DB::table('images')->where('name', 'LIKE', '%' . $query . '%')->paginate(50)->sortByDesc('likes');
                return view('pages.images')->with(compact('images', 'amountimages'));
            } else {
                $images = DB::table('images')->where('category', '=', $query2)->paginate(50)->sortByDesc('likes');
                return view('pages.images')->with(compact('images', 'amountimages'));
            }

        }

        else {
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

    public function ImageActive(Request $request)
    {

        if (Auth::check()) {

            $image_id = $request['id'];


            $active = DB::table('images')->where('id', '=', $image_id)->first();


            if ($active->active == 1){
                DB::table('images')->where('id', '=', $image_id)->update(['active' => 0]);
                return 'inactive';
            }
            else{
                DB::table('images')->where('id', '=', $image_id)->update(['active' => 1]);
                return 'active';
            }
        }

    }

    public function adminActive(Request $request){
        $user = Auth::user();
        if (Auth::check() && $user->admin == 1){

            $user_id = $request['id'];

            $active = DB::table('users')->where('id', '=', $user_id)->first();


            if ($active->active == 1){
                DB::table('users')->where('id', '=', $user_id)->update(['active' => 0]);
                return 'inactive';
            }
            else{
                DB::table('users')->where('id', '=', $user_id)->update(['active' => 1]);
                return 'active';
            }
        }
        else{
            return view('auth.login');
        }
    }




    public function edit($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $image = Image::where('id', '=', $id)->get()->first();
            if ($user->id == $image->user_id)
                return View::make('pages.edit')->with('image', $image);
            else
                return view('errors.imageError');

        } else {
            return view('auth.login');
        }
    }
    public function ImageUpdate(Request $request){
        DB::table('images')->where('id', '=', $request->id)->update(
            ['name' => $request->title, 'details' => $request->description, 'image_url' => $request->image_url, 'category' => $request->category,
                'updated_at' => \Carbon\Carbon::now()]
        );
            return Redirect::to('image/details/'.$request->id);
    }


    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'title' => 'max:50',
                'description' => 'max:255'
            ]);

            $user = Auth::user();


            DB::table('images')->insert(
                ['user_id' => $user->id, 'name' => $request->title, 'author' => $user->name, 'details' => $request->description, 'image_url' => $request->image_url, 'likes' => 0, 'category' => $request->category, 'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()]
            );

            return redirect()->route('images.search');
        }
        else{
            return view('auth.login');
        }
    }

    public function imageUpload(){
        if (Auth::check()) {
            return view('pages.upload');
        }
        else{
            return view('auth.login');
        }
    }

    public function ratingsImage($imageId)
    {

        if (Auth::check()) {

            $image = Image::where('id', '=', $imageId)->first();
            $userId = $image->likes()->where('image_id', '=', $imageId)->pluck('user_id');

            $length = count($userId);

            for ($x = 0; $x < $length; $x++) {
                $usernames[] = User::where('id', '=', $userId[$x])->value('name');
            }


            $title = Image::where('id', '=', $imageId)->value('name');

            $ratings = $image->likes()->where('image_id', '=', $imageId)->get();
            $ratingexist =  $image->likes()->where('image_id', '=', $imageId)->get()->first();

            if(!$ratingexist){
                return view('pages.ratings')->with(compact('ratingexist', 'title'));
            }
            else{
                return view('pages.ratings')->with(compact('ratings', 'title', 'usernames','ratingexist'));
            }

        } else {
            return view('auth.login');
        }

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
        }

        else{
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
        return $image->likes;
    }

}




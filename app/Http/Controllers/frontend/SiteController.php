<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $image = 'img/default.png';

        // $user_ip = GeoIP()->getLocation($_SERVER['REMOTE_ADDR']);
        //$user_ip = GeoIP()->getLocation('41.248.57.225');
        //dd($user_ip);

        return view('front-end.index');
    }


    public function profile($user)
    {
        $profile = User::find($user)->profile;

        return view('front-end.users.profile',['profile'=>$profile]);
    }


    public function settings(User $user)
    {
        return view('front-end.users.settings');
    }


    public function edit(User $user)
    {
        return view('front-end.users.edit');
    }

    public function store(Request $request){

        // validate input you have to be required
        /*  $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'picture' => 'mimes:jpeg,bmp,png,jpg,svg',
         ]); */

        // store the image
        $picture = 'images/img/default.png';
        if ($request->hasFile('picture')){
            $picture = $this->saveImages($request->get('picture') , 'images/img' );
        }

        //store the post request data
        /* Posts::create([
           'title' => $request->get('title'),
           'category' => $request->get('category'),
           'body' => $request->get('body'),
           'picture' => $picture,
        ]); */


        /* return redirect()->route('posts.index')->with('success','the post saved with success'); */

    }

}

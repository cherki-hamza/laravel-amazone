<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Traits\ImageTrait;
use App\Traits\RemoveImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use ImageTrait , RemoveImageTrait;

    // show the dashboard **********************************************************//
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        return view('back-end.backend.index' , ['user'=>$user]);
    }
    //*****************************************************************************//

    // show user profile ***********************************************************//
    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $profile = User::find($user_id)->profile;
        $user_roles = ['super-user','admin','editor','viewer'];
        $user_sex = ['man','women','robot','human'];
        return view('back-end.backend.index' , ['user'=>$user , 'profile'=>$profile , 'user_roles' =>$user_roles , 'user_sex'=>$user_sex]);
    }
    //*****************************************************************************//

    // update user profile *******************************************************//
    public function update_profile(Request $request,$id)
    {
        $user = User::where('id' , $id)->first();
        $profile = User::find($id)->profile;
        $oldFilename = $profile->picture;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'mimes:jpeg,bmp,png,jpg,svg',
            'mobile' => 'required',
            'sex' => 'required',
            'role' => 'required',
        ]);

        // update the image
        if ($request->hasFile('photo')){
           // $picture = $this->SaveImage($request->file('photo') , 'images/profile' );
            //  composer require league/flysystem-aws-s3-v3  and set visibilite
            //  Storage::disk('s3')->setVisibility('$picture' , 'public');  or 'private'
            $picture = $request->file('photo')->store('images/profile' , 's3');
            // delete old image
            $this->RemoveImage($oldFilename);

            $profile->update([
               // 'picture' => $picture,
                'picture' => Storage::disk('s3')->url($picture),
            ]);
        }

        //update the post request data
        $user->update([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'photo' => $request->get('photo'),
           'mobile' => $request->get('mobile'),
           'sex' => $request->get('sex'),
           'role' => $request->get('role'),
        ]);

         return redirect()->back()->with('success','the Profile Updated with success');

    }
    //*****************************************************************************//

    // show all users ************************************************************//
    public function all_users()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $users = User::paginate(6);
        return view('back-end.backend.index' , ['user'=>$user ,'users'=>$users]);
    }
    //*****************************************************************************//

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\File;



class UsersController extends Controller
{
    public function userprofile(User $user)
    {

        return view('users.userprofile', compact('user'));
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function search(Request $request)
    {
        $searchWord = $request->input('search');
        $query = User::where('id', '!=', auth()->user()->id);
        if ($searchWord) {
            $query->where('users.username', 'like', "%{$searchWord}%");
        }
        $user = $query->get();
        return view('users.search', compact('user', 'searchWord'));
    }

    public function setting(RegisterFormRequest $request)
    {
        // if ($request->isMethod('post')) {

            // if (!File::exists(public_path('uploads'))) {
            //     File::makeDirectory(public_path('uploads'), 0755, true, true);
            // }
            $profileImage = $request->file('images');
            $validation = $request->validated();

            $user = Auth::user();
            $user->username = $validation['username'];
            $user->mail = $validation['mail'];
            $user->password = Hash::make($validation['password']);
            $user->bio = $validation['bio'];

            if($profileImage) {
                $path = $profileImage->store('');
                // dd($path);
                // $path = asset('storage/images'. Auth::user()->images);
                $user->update(['images' => $path]);
                $user->save();
            } else {
                // asset('images/'. Auth::user()->images);
                $path = asset('images/'. Auth::user()->images);
            }

            $user->images = $path;
            // $user->images = $validation['images'];
            // if ($request->hasFile('images')) {
            //     $uploadedFile = $request->file('images');
            //     $path = $uploadedFile->storeAs('uploads', 'icon.png','public');
            //     $user->images = $path;
                // $hasUploadedImage = true;

            $user->save();

        // }

        // $user->save();
        // $request->session()->put("request", $request);
        return redirect('/profile')->with('success', 'プロフィールを更新しました！');
    }

    // public function usersearch(Request $request){
    //     $searchWord = $request->input('search');
    //     $users = User::where('username', 'like', "%{$searchWord}")->get();
    //     return view('users.search', ['users' => $users]);
    // }

}

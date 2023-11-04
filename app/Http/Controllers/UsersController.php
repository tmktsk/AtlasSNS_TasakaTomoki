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
        // return redirect('/search')->with('user', '$user')->with('searchWord', $searchWord);
    }

    public function setting(RegisterFormRequest $request)
    {
            $profileImage = $request->file('images');
            $validation = $request->validated();

            $user = Auth::user();
            $user->username = $validation['username'];
            $user->mail = $validation['mail'];
            $user->password = Hash::make($validation['password']);
            $user->bio = $validation['bio'];

            if($profileImage) {
                // $path = Storage::disk('public')->putFileAs('images', $profileImage, $newimage);
                $path = $profileImage->store('images', 'public');
                $user->update(['images' => $path]);
                $user->check = 'yes';
                $user->save();
            }

            // $user->images = $path;

            $user->save();

        return redirect('/profile')->with('success', 'プロフィールを更新しました！');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Hash;



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

            $validation = $request->validated();

            $hashedPassword = Hash::make($validation['password']);

            $user = Auth::user();
            $user->username = $validation['username'];
            $user->mail = $validation['mail'];
            $user->password = $validation['password'];
            $user->bio = $validation['bio'];
            $user->images = $validation['images'];

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

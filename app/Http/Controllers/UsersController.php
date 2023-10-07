<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    public function profile(User $user){

        return view('users.userprofile', compact('user'));
    }
    
    public function search(Request $request){
        $searchWord = $request->input('search');
        $query = User::where('id', '!=', auth()->user()->id);
            if ($searchWord) {
                $query->where('users.username', 'like', "%{$searchWord}%");
            }
        $user = $query->get();
        return view('users.search', compact('user', 'searchWord'));
    }


    // public function usersearch(Request $request){
    //     $searchWord = $request->input('search');
    //     $users = User::where('username', 'like', "%{$searchWord}")->get();
    //     return view('users.search', ['users' => $users]);
    // }

}

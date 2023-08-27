<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $user = User::where('id', '!=', auth()->user()->id)->get();
        return view('users.search', compact('user'));
    }

    // public function login(){
    //     return view('layouts.login');
    // }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

// use App\Models\Following;
// use App\Models\Follower;


class FollowsController extends Controller
{

    // public function search()
    // {
    //     $fillable = ['following_id', 'followed_id'];
    //     return view('users.search', ['fillable' => $fillable]);
    // }

    public function follow(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return redirect()->back();
    }

    public function followList()
    {
        $followedUsers = Auth::user()->following()->pluck('followed_id');
        // $followingCount = $user->followings->count();

        $users = User::whereIn('users.id', $followedUsers)
            ->with('posts')
            ->get();

        $posts = Post::whereIn('posts.user_id', $followedUsers)
            ->with('users')
            ->get();
        // dd($posts);
        return view('follows.followList')->with('users', $users);
    }
    public function followerList()
    {
        $followerUsers = Auth::user()->followers()->pluck('following_id');
        $users = User::whereIn('users.id', $followerUsers)
            ->with('posts')
            ->get();
        return view('follows.followerList')->with('users', $users);
    }
}

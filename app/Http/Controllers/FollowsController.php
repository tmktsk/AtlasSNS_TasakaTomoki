<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Following;
// use App\Models\Follower;

use App\Models\User;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        Auth::user()->following()->attach($user);

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user);

        return redirect()->back();
    }
}


class FollowsController extends Controller
{

    public function search()
    {
        $fillable = ['following_id', 'followed_id'];
        return view('users.search', ['fillable' => $fillable]);
    }
    // public function follow(Request $request, $followingId)
    // {
    //     $followedId = Auth::id();
    //     Following::create([
    //         'following_id' => $followingId,
    //         'followed_id' => $followedId,
    //     ]);

    //     return redirect()->back();
    // }

    // public function unfollow(Request $request, $followedId)
    // {
    //     // フォロー解除処理
    //     $followingId = Auth::id();
    //     Follower::where('following_id', $followingId)
    //             ->where('followed_id', $followedId)
    //             ->delete();

    //     return redirect()->back();
    // }

    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}

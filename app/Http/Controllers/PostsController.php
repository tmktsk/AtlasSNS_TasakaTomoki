<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Form;


class PostsController extends Controller
{
    public function index()
    {
        $followed_id = Auth::user()->following()->pluck('followed_id');
        $login_id = Auth::id();
        $posts = Post::with('user')
            ->whereIn('posts.user_id', $followed_id)
            ->orWhere('posts.user_id', $login_id)
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $user = Auth::user();
        $followingCount = $user->following()->count();
        $followerCount = $user->followers()->count();
        return view('posts.index')->with('posts', $posts)
        ->with('followingCount', $followingCount)
        ->with('followerCount', $followerCount);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'post' => 'required|min:1|max:150',
            ]);

            $postContent = $request->input('post');

            Post::create([
                'post' => $postContent,
                'user_id' => Auth::id(),
            ]);
            // $posts->save();

            // $following_id = Auth::user()->following()->pluck('followed_id');
            // $posts = Post::with('user')->whereIn('user_id', $following_id)->get();


            // return view('posts', compact('posts'));

            return redirect('/top')->with('post', $postContent);
        }
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function update(Request $request)
    {
        // $updatedPostContent = $request->input('update');
        // $updateData = $request->input('update');
        $id = $request->input('id');
        $post = Post::find($id);
        // $post = Post::where('id', $id)->update([
        //     'post' => $updateData,
        // ]);
        $post->post = $request->input('update');
        $post->save();

        return redirect('/top')->with('post', $post);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //

    public function dashboard() {
        return view('/dashboard1');

    }

    public function index() {

        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function PostCategory(Category $category) {

        $posts = Post::where('category_id', $category->id)->get();
        return view('all.categorypost', compact('posts', 'category'));
    }

    public function Users() {

        $users = User::all();
        return view('all.user', compact('users'));
    }

    public function UserPostCategory($id) {

        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->get();
        return view('all.post_user', compact('posts', 'user'));
    }

    public function create() {
        return view('all.post');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'post' => 'required',
        ]);

        Post::create([
            'user_id'   => $request->user_id,
            'category_id' => $request->category_id,
            'post'      => $request->post
        ]);

        return redirect('/dashboard');
    }
}

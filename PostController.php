<?php

namespace Lucaborghy\Blogkit;

use Illuminate\Http\Request;
use Lucaborghy\Blogkit\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function index()
  {
      return redirect()->route('post.create');
  }

  public function create()
    {
        $posts = Post::all();
        $submit = 'Add';
        return view('lucaborghy.blogkit.list', compact('posts', 'submit'));
    }

    public function store()
    {
        $input = Request::all();
        Post::create($input);
        return redirect()->route('post.create');
    }

    public function edit($id)
    {
        $posts = Post::all();
        $post = $posts->find($id);
        $submit = 'Update';
        return view('lucaborghy.blogkit.list', compact('posts', 'post', 'submit'));
    }

    public function update($id)
    {
        $input = Request::all();
        $post = Post::findOrFail($id);
        $post->update($input);
        return redirect()->route('post.create');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.create');
    }
}

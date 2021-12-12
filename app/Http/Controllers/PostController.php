<?php

namespace App\Http\Controllers;
use App\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    
     
    public function index()
    {
        //$posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20); //it returns all posts in the natural order...
                              //we have to pass it down to the views so that we can start to iterate this to the index view  
            //dd($posts);       
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
       return view('posts.show',[
           'post' => $post
       ]);
    }

    public function store(Request $request)
    {
         $this->validate($request, [
             'body' => 'required'
         ]);

       /* Post::create([
             'user_id' => auth()->user()->id(),
             'body' => $request->body 
        ]);*/


         $request->user()->posts()->create($request->only('body'));

         return back();

    }
    public function destroy(Post $post)
    {
       //dd($post);
      /* if(!$post->ownedBy(auth()->user()))
       {
           dd('no');
       }*/
       $this->authorize('delete', $post);
       $post->delete();
       return back();
    }
}

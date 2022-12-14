<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Session;

class PostController extends Controller
{



    public function index(){
        $n=0;
        if(auth()->user()->userHasRole('Admin'))
            $posts = Post::orderBy('created_at','desc')->paginate(5);
        else $posts = auth()->user()->posts()->paginate(5);
        return view('admin.posts.index', ['posts'=>$posts,'n'=>$n]);

    }

   public function show(Post $post){
       return view('blog-post', ['post'=>$post]);
   }

   public function create(){
        $this->authorize('create', Post::class);
        return view('admin.posts.create');

   }
   public function store(){
       $this->authorize('create', Post::class);
       $inputs = request()->validate([
         'title' => 'required |min:8|max:255',
         'post_image' => 'mimes:jpeg,png',
         'body' => 'required'
       ]);

       if(request('post_image')){
         $inputs['post_image'] = request('post_image')->store('post_images');
       }
       auth()->user()->posts()->create($inputs);
       Session::flash('post-created','Post '.$inputs['title'].' Created');

       return redirect()->route('post.index');


   }


   public function edit(Post $post){
        $this->authorize('view',$post);
        //if(auth()->user()->can('view',$post))
        return view('admin.posts.edit', ['post'=>$post]);

   }

   public function destroy(Post $post){

        $this->authorize('delete',$post);
       $post->delete();

       Session::flash('message','Post was deleted');

       return back();
   }

   public function update(Post $post){
    $inputs = request()->validate([
        'title' => 'required |min:8|max:255',
        'post_image' => 'mimes:jpeg,png',
        'body' => 'required'
      ]);


      if(request('post_image')){
        $inputs['post_image'] = request('post_image')->store('post_images');
        $post->post_image = $inputs['post_image'];
      }
      $post->title = $inputs['title'];
      $post->body = $inputs['body'];


      $this->authorize('update',$post);
      $post->save();


      Session::flash('post-updated','Post from '.$post->user->name.': "'.$inputs['title'].'" updated');

      return redirect()->route('post.index');







   }



}

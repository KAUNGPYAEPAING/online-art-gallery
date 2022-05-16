<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){
        
        // $posts = Post::all();
        $posts = auth()->user()->posts;
        

        return view('seller.posts.index', ['posts'=>$posts]);
    }

    public function allpost(){
        $posts = Post::all();

        return view('seller.posts.adminindex', ['posts'=>$posts]);
    }





    public function show(Post $post){
        
        $comments = Comment::where('post_id', $post->id)->get();

        return view('post', ['post'=>$post, 'comments'=>$comments]);
    }

    public function create(){
        $categories = Category::all();
        return view('seller.posts.create', ['categories'=>$categories]);
    }

    public function store(){
        // dd(request()->all());

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'body'=>'required|min:8',
            'post_image'=>'required|file',
            'price'=> 'required',
            'category_id'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
        
        auth()->user()->posts()->create($inputs);

        Session::flash('post-created-message', $inputs['title']. ' post was created');

        return redirect()->route('post.index');
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('seller.posts.edit', ['post'=>$post, 'categories' => $categories]);
    }

    public function update(Post $post){
        $inputs = request()->validate([
            'title'=>'required| min:8| max:255',
            'post_image'=>'file',   //'mimems:jpeg,png'
            'body'=>'required',
            'price' => 'required',
            'category_id'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');   //making directory with store('name)
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->price = $inputs['price'];
        $post->category_id = $inputs['category_id'];

        $this->authorize('update', $post);         //checking update from postpolicy, in order to do that must make policy that are connect with model// need to add model

        auth()->user()->posts()->save($post);          //can delete and write $post->save() if u don't want to save/change user  can also use update()

        Session::flash('post-update-message', $inputs['title']. ' post was updated');

        return redirect()->route('post.index');
    }

    public function destroy(Post $post){
        $post->delete();

        Session::flash('post-delete-message', $post['title'].' was delete');

        return back();
    }
}

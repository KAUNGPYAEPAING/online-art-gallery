<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has('category')){
            $category = Category::findOrFail($request->get('category'));
            $post = Post::where('category_id',$category->id)->get();

        }else{
            $post = Post::all();
        }

        $category = Category::all();

        return view('home', ['posts'=>$post, 'categories'=>$category]);
    }
}

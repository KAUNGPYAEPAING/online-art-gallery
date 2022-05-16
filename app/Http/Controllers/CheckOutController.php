<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CheckOut;
use App\Models\Post;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    //
    public function index(Post $post)
    {

        return view('checkout', ['post'=> $post]);
    }

    public function store(Request $request){
        $inputs = $request->validate([
            'name'=>['required'],
            'title'=>['required'],
            'post_id'=>['required'],
            'address'=>['required'],
            'phone_number'=>['required'],
            'description'=>['required'],
            'total_price'=>['required'],
            'seller_id'=>['required']
        ]);

        CheckOut::create($inputs);

        return view('thanks');
    }

    public function show(){
        $checkouts = CheckOut::where('name',  auth()->user()->name)->get();

        return view('seller.checkout.index', ['checkouts' => $checkouts]);
    }

    public function edit(CheckOut $checkout){
       return view('seller.checkout.enjoymsg', ['checkout'=>$checkout]);
    }

    public function update(CheckOut $checkout){
        $input = request()->validate([
            'progress'=>'required'
        ]);

        $checkout->progress = $input['progress'];

        $checkout->save();

        return redirect()->route('admin.checkout.show');
     }

     public function allcheckout(){
         $checkouts = CheckOut::all();

         return view('seller.checkout.allcheckout', ['checkouts'=>$checkouts]);

     }
 

    public function customer(){
        $checkouts = CheckOut::where('seller_id',  auth()->user()->id)->get();

        return view('seller.checkout.customer', ['checkouts' => $checkouts]);
    }

}

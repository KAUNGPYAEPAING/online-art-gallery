<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        return view('seller.index');
    }
}

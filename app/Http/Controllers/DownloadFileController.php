<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    //
    function getFile(Post $post){

        $arr = explode('/',$post->post_image);
        $file= public_path(). '/storage/images/'. last($arr);


        return (FacadeResponse::download($file));

    }
}

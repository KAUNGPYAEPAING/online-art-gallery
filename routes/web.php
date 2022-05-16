<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');
Route::get('/post/download/{post}', [App\Http\Controllers\DownloadFileController::class, 'getFile'])->name('post.download');
Route::get('/post/{post}/checkout',[App\Http\Controllers\CheckOutController::class, 'index'])->name('post.checkout.index');
Route::post('/post/checkout/thanks',[App\Http\Controllers\CheckOutController::class, 'store'])->name('post.checkout.store');

// Route::get('/post/{post}', [App\Http\Controllers\CommentController::class, 'show'])->name('comment.lists');

Route::middleware('auth')->group(function(){
        
    Route::get('/admin', [App\Http\Controllers\SellerController::class, 'index'])->name('seller.index');


    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');



    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('seller.posts.create');

    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    Route::put('admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
    Route::delete('admin/users/{user}/destroy',  [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.user.destroy');


    Route::get('admin/comments',   [App\Http\Controllers\CommentController::class, 'index'])->name('post.comment.index');
    Route::post('admin/comments',   [App\Http\Controllers\CommentController::class, 'store'])->name('post.comment.store');
    Route::delete('admin/comments/{comment}/destroy',   [App\Http\Controllers\CommentController::class, 'destroy'])->name('post.comment.destroy');



    Route::get('admin/checkout', [App\Http\Controllers\CheckOutController::class, 'show'])->name('admin.checkout.show');
    Route::get('admin/checkout/{checkout}/edit', [App\Http\Controllers\CheckOutController::class, 'edit'])->name('admin.checkout.edit');
    Route::patch('admin/checkout/{checkout}/update', [App\Http\Controllers\CheckOutController::class, 'update'])->name('admin.checkout.update');
    Route::get('admin/checkout/customer', [App\Http\Controllers\CheckOutController::class, 'customer'])->name('admin.checkout.customer');
});

Route::middleware('role:Admin')->group(function(){
        Route::get('/admin/posts/allpost',[App\Http\Controllers\PostController::class, 'allpost'])->name('post.allpost');

        
    Route::get('admin/checkout/allcheckout', [App\Http\Controllers\CheckOutController::class, 'allcheckout'])->name('admin.checkout.all');


        Route::get('admin/users',  [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.index');
        Route::put('admin/users/{user}/attach',  [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
        Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');

        Route::get('admin/category',   [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
        Route::post('admin/category',   [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('admin/category/{category}/edit',   [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('admin/category/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('admin/category/{category}/destroy',   [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.destroy');

        
    Route::get('admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.role.index');
    Route::post('admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.role.store');
    Route::delete('admin/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.role.destroy');
    Route::get('admin/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.role.edit');  
    Route::put('admin/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.role.update');  
});


//403 authorize
// Route::middleware('auth', 'can:view,user')->group(function(){
        Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
// });
<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;
Route::resource('photos', PhotoController::class);

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function() {
    return 'World';
});

Route::get('/', [HomeController::class,'index']);
Route::get('/about', [AboutController::class,'about']);
Route::get('/articles/{id}', [ArticleController::class,'articles']);



// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya '.$name;
// });

Route::get('/posts/{posts}/comments/{comment}', function ($postID, $commentID) {
    return 'Pos ke-'.$postID." Komentar ke-: ".$commentID;
});


// Route::get('/user/{name?}', function ($name='John') {
//     return 'Nama Saya '.$name;
// });

// Route Name
// Route::get('/user/profile', function () {})->name('profile');

// Route::get(
// '/user/profile',
// [UserProfileController::class, 'show']
// )->name('profile');

// Generating URLs...
// $url = route('profile');

// Generating Redirects...
// return redirect()->route('profile');

// Route Group dan Route Prefixes
// Route::middleware(['first', 'second'])->group(function () {
// Route::get('/', function () {
// // Uses first & second middleware...
// });
// Route::get('/user/profile', function () {
// // Uses first & second middleware...
// });
// });
// Route::domain('{account}.example.com')->group(function () {
// Route::get('user/{id}', function ($account, $id) {
// //
// });
// });
// Route::middleware('auth')->group(function () {
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/post', [PostController::class, 'index']);
// Route::get('/event', [EventController::class, 'index']);
// });

// Rooute Prefix
// Route::prefix('admin')->group(function () {
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/post', [PostController::class, 'index']);
// Route::get('/event', [EventController::class, 'index']);
// });

// Redirect Routes
// Route::redirect('/here', '/there');

// View Rooutes
// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
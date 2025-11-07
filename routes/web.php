<?php

 use Illuminate\Support\Facades\Route;
 use app\Models\Users;
 use app\Models\Comment;
 use App\Http\Controllers\GameController;
 use App\Http\Controllers\CategoryController;
 use App\Http\Controllers\PlatformController;


 // Route::get('/', function () {
 //     return view('welcome');
 // });
 // Route::get('/greeting', function () {
 //     return 'Hello World';
 // });


 Route::get('/', function () {
      return redirect()->route('games.index');
 });
 Route::resource('games', GameController::class);
 Route::resource('categories', CategoryController::class);
 Route::resource('platforms', PlatformController::class);



<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:')->get('/user', function (Request $request) {
    return $request->user();
});

auth()->user();

// create a user route
Route::get('/user-create', function(Request $request){
    App\Models\User::create([
        'name' => 'William',
        'email' => 'williampepple@gmail.com',
        'password' => Hash::make('secretpassword')
    ]);
});

// login a user
Route::get('/login', function(){
    $credentials = request()->only(['email', 'password']);
    $token = auth()-> attempt($credentials);
    return $token; 
});

 
//get the authenticated user

Route::middleware('auth:api')->get('/me', function(){
    return auth()->user();
    return $user->id;
});


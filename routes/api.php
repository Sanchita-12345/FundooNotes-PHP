<?php

use App\Http\Controllers\api\NoteController;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\PasswordResetRequestController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UpdatePwdController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    // Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/register', [AuthController::class, 'register']);
    // Route::post('sendPasswordResetLink', 'App\Http\Controllers\PasswordResetRequestController@sendEmail');
    // Route::post('resetPassword', 'App\Http\Controllers\ChangePasswordController@passwordResetProcess');


});

Route::post('/register', [
    AuthController::class, 'register'
]);

Route::post('/login', [
    AuthController::class, 'login'
]);

Route::get('/user', [
    AuthController::class, 'getUser'
])->middleware('auth.jwt');

//display notes
Route::get('/notes', [
    NoteController::class, 'index'
])->middleware('auth.jwt');

//display particular note
Route::get('/notes/{id}', [
    NoteController::class, 'show'
])->middleware('auth.jwt');

//create new note
Route::post('/notes', [
    NoteController::class, 'store'
])->middleware('auth.jwt');

//update notes
Route::put('/notes/{id}', [
    NoteController::class, 'update'
])->middleware('auth.jwt');

//delete notes
Route::delete('/notes/{id}', [
    NoteController::class, 'destroy'
])->middleware('auth.jwt');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\User\VoterController;

// ADMIN ROUTES //
Route::get('admin/register',[AdminAuthController::class,'create'])->name('register_admin');
Route::post('admin/register',[AdminAuthController::class,'register'])->name('register_admin');

Route::group(['middleware' =>['admin']], function(){
    Route::get('users/manage',[AdminController::class,'create'])->name('manage_users');
    Route::get('administrator',[AdminController::class,'superadmin'])->name('superadmin');
    Route::post('manage',[AdminController::class,'manageRights'])->name('roles.update');
});

//VOTER rOUTES //

Route::group(['middleware' => ['voter']], function(){

    Route::get('homepage',[VoterController::class,'index'])->name('homepage');

});


                // POLL rOUTES

 Route::resource('polls', PollController::class)->middleware('admin');
 Route::resource('candidates', CandidateController::class)->middleware('admin');



 Route::get('/positions/{id}',[PositionController::class, 'index'])->name('positions.index');
 Route::post('/positions/{id}',[PositionController::class, 'store'])->name('positions.store');


// Route::get('/polls/create', [PollController::class, 'create'])->name('polls.create');
// Route::post('/polls', [PollController::class, 'store'])->name('polls.store');
// Route::get('/polls/{id}', [PollController::class, 'show'])->name('polls.show');
// Route::get('/polls/{id}/edit', [PollController::class, 'edit'])->name('polls.edit');
// Route::put('/polls/{id}', [PollController::class, 'update'])->name('polls.update');
// Route::delete('/polls/{id}', [PollController::class, 'destroy'])->name('polls.destroy');
// Route::get('/polls', [PollController::class, 'index'])->name('polls.index');

                //End Of Poll Routes




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USER DASHBOARD
Route::get('/dashboard', function () {
    return view('samples.user');
})->middleware(['auth', 'voter'])->name('user_dashboard');

// ADMIN DASHBOARD
Route::get('/admin_dashboard', function () {
    return view('samples.admin');
})->middleware(['auth','admin'])->name('admin_dashboard');

// Route::get('homepage', function(){
//     return view('samples.homepage');
// })->name('homepage');


// user protected routes
// Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
//     Route::get('/', 'HomeController@index')->name('user_dashboard');
//     Route::get('/list', 'UserController@list')->name('user_list');
// });

// // admin protected routes
// Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
//     Route::get('/', 'HomeController@index')->name('admin_dashboard');
//     Route::get('/users', 'AdminUserController@list')->name('admin_users');
// });

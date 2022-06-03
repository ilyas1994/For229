<?php

use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    $data = new \App\Http\Controllers\Rent\AllRent();
    return $data->index();

})->name('qwe');

Route::get('/zxc', function () {

    return view('delete');

});


Auth::routes();

Route::get('/form', function () {
    return view('index');
});

Route::get('/asd', function () {
    return view('welcome');
});

// пишем роут для перехода в dashboard
Route::get('/dash', function (){
    return view('home');
})->name('dash');

Route::get('/add', [\App\Http\Controllers\ResponseAdmin\InsertResponse::class, 'index'])->name('add');

Route::get('/response-true', [\App\Http\Controllers\ResponseAdmin\StatusResponseTrue::class, 'index'])->name('responseTrue');
Route::get('/response-false', [\App\Http\Controllers\ResponseAdmin\StatusResponseFalse::class, 'index'])->name('responseFalse');


// test
Route::get('/res', function () {
    $respo = new \App\Http\Controllers\ResponseAdmin\ResponseAdmin();
    $data =  $respo->index();
    return view('fortest.responseAdmin')->with('data', $data);
});

Route::get('/get-all-data', function () {
    $crd = new \App\Http\Controllers\Crud\PostController();
    dd($crd->index());
});

//CRUD
Route::resource('crud-action', \App\Http\Controllers\Crud\PostController::class);

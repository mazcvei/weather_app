<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

## Paginas
Route::get('/pagina/{slug}', 'PageController@show')->name('pagina');

## Posts
Route::get('/noticias', 'PostController@index')->name('noticias');
Route::get('/noticias/{id}/{slug?}', 'PostController@show');

Route::get('/datatables', function(){
    $estudiantes=\App\Student::all();
        return view('datatables',compact('estudiantes'));
})->name('datatables');
Route::get('/infinitescroll', function(){
    $estudiantes=\App\Student::paginate(6);
    return view('infinitescroll',compact('estudiantes'));
})->name('infinitescroll');

## Login Social
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'facebook|google|linkedin');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'facebook|google|linkedin');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

<?php

use App\File;
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

Route::get('/subscription/create', ['as' => 'home', 'uses' => 'SubscriptionController@index'])->name('subscription.create');
Route::post('order-post', ['as' => 'order-post', 'uses' => 'SubscriptionController@orderPost']);


Route::get('cropindex', 'ImageCropController@index')->name('cropimage');;

Route::post('image_crop/upload', 'ImageCropController@upload')->name('image_crop.upload');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

## Paginas
Route::get('/pagina/{slug}', 'PageController@show')->name('pagina');

## Posts
Route::get('/noticias', 'PostController@index')->name('noticias');
Route::get('/noticias/{id}/{slug?}', 'PostController@show');


Route::get('/datatables', function () {
    $estudiantes = \App\Student::all();
    return view('datatables', compact('estudiantes'));
})->name('datatables');
Route::get('/infinitescroll', function () {
    $estudiantes = \App\Student::paginate(6);
    return view('infinitescroll', compact('estudiantes'));
})->name('infinitescroll');

Route::get('/owl', function () {
    return view('owl_carousel');
})->name('owl');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/uploads', function () {
        return view('upload_files');
    })->name('uploads');
    Route::post('/upload-file', 'UploadfilesController@upload')->name('upload.files');
    Route::get('/download/{path}', 'UploadfilesController@download')->name('download.files');
});


## Login Social
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'facebook|google|linkedin');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'facebook|google|linkedin');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

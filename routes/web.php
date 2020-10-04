<?php

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

Route::get('/', 'BookController@index');

Route::get('/search', 'BookController@search');

Route::get('/book/publishedyear/{publishedyear}', 'BookController@indexBookByPublishedYear');
Route::get('/book/category/{category}', 'BookController@indexBookByCategory');

Route::get('/admin/login', function(){
    if(Auth::check()) {
    return redirect('/dashboard');
} else {
    return view('pages.login');
}
})->name('login');

//Route::get('/admin/login', 'AuthController@loginPage')
Route::post('/admin/login', 'AuthController@login');

Route::group(['middleware' => 'auth:web'],function () {

    Route::get('/dashboard', 'BookController@index')->name('dashboard');

    Route::get('/dashboard/book/publishedyear/{publishedyear}', 'BookController@indexBookByPublishedYear');
    Route::get('/dashboard/book/category/{category}', 'BookController@indexBookByCategory');

    Route::get('/book/create', 'BookController@create');
    Route::get('/book/edit/{id}', 'BookController@edit');

    Route::post('/book/create', 'BookController@store');
    Route::post('/book/edit/{id}', 'BookController@update');
    Route::get('/book/delete/{id}', 'BookController@destroy');


    Route::post('/dashboard/search', 'FetchController@index');
    Route::get('/dashboard/search/{id}', 'FetchController@show');

    Route::get('/admin/register', 'AuthController@registerPage');
    Route::post('/admin/register', 'AuthController@register');

    Route::get('/admins', 'AdminController@index');
    Route::post('/admin/changepassword', 'AdminController@update');
    Route::get('/admin/delete/{id}', 'AdminController@destroy');

    Route::get('/logout', 'AuthController@logout');

});



// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

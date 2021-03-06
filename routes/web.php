<?php

// !CONTROLLER ROTTE SPECIFICHE PER UTENTI LOGGATI

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
// !NOT AUTH. ROUTES
// Home
Route::get('/', 'HomeController@index')->name('home');
// Index lista post
Route::get('posts', 'PostController@index')->name('posts.index');
// Dettaglio
Route::get('posts/{slug}', 'PostController@show')->name('posts.show');

// !AUTHENTICATION ROUTES
Auth::routes();
// Creazione rotte che abbiano sempre un prefisso /admin, il cui controller sia situato all'interno della cartellina/namespace Admin e il cui controllo sia sempre autenticato dal layer middleware auth. Infine group per creare molteplici rotte secondo queste direttive.
Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function() {
        // Admin home
        Route::get('/', 'HomeController@index')->name('home');
        // Post CRUD
        Route::resource('posts', 'PostController');
    });


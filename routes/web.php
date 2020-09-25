<?php

use Illuminate\Support\Facades\Route;
use    Illuminate\Contracts\Container\BindingResolutionException ;
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

// AUTH
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Admin ROutes //Simple Codes
Route::middleware(['admin'])->get('/-+_', function () {
    return view('/-+_/dashboard');
})->name('dashboard');

Route::get('-+_', ['App\Http\Controllers\ReportesController' , 'index2'])->name('admin');

// Users Route CP
Route::get('-+_/users', ['App\Http\Controllers\UsersController' , 'index'])->name('users');
Route::get('-+_/users/{id}/edit', ['App\Http\Controllers\UsersController' , 'show'])->name('users.edit');
Route::post('-+_/users/{id}/update', ['App\Http\Controllers\UsersController' , 'update'])->name('users.update');
Route::get('-+_/users/{id}/delete', ['App\Http\Controllers\UsersController' , 'destroy'])->name('users.delete');

// Users Route CP

Route::get('-+_/reportes', ['App\Http\Controllers\ReportesController' , 'index'])->name('reportes');
Route::get('-+_/reportes/{id}/show', ['App\Http\Controllers\ReportesController' , 'show'])->name('reportes.show');
Route::get('-+_/reportes/{id}/active', ['App\Http\Controllers\ReportesController' , 'active'])->name('reportes.active');

// Settings Route CP
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');


Route::get('/live_search/action', ['App\Http\Controllers\LiveSearch' , 'action'])->name('live_search.action');
Route::get('/thief/{id}/show', ['App\Http\Controllers\ReportesController' , 'show2'])->name('show');





Route::get('-+_/Settings/1/', ['App\Http\Controllers\SettingsController' , 'index'])->name('settings');
Route::post('-+_/Settings/{id}/update', ['App\Http\Controllers\SettingsController' , 'update'])->name('settings.update');


Route::get('/theifs/list', ['App\Http\Controllers\ListThiefs' , 'index'])->name('thiefs.list');
Route::get('/theifs/list/action', ['App\Http\Controllers\ListThiefs' , 'action'])->name('live_search2.action');

// send Rep
Route::post('/send', ['App\Http\Controllers\ReportesController' , 'send'])->name('send');



Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

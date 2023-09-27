<?php

use Illuminate\Support\Facades\Route;
use App\Models\Person;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DeptsController;


use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;



/*
|----------------------------php----------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//
//Route::get('/', function () {
//    return view('auth.login');
//});
//
//
//
//
//
//Route::get('home2', function () {
//    $cities = \App\Models\City::all();
//    $persons = \App\Models\Person::all();
//    $depts = \App\Models\Depts::all();
//    return view('home2', compact('cities', 'persons', 'depts'));
//})->name('home2');
//
//
//
//
//
//Route::resource('city',CityController::class);
//Route::resource('person',PersonController::class);
//
//
//Route::resource('dept',DeptsController::class);
//
//
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//
//
//Auth::routes();
//
//
//Route::group(['middleware' => ['auth']], function() {
//    Route::resource('roles', RoleController::class);
//    Route::resource('users', UserController::class);
//    Route::get('person.search',[PersonController::class,'search'] )->name('person.search');
//
//
//
//
//
//    Route::get('/home', [HomeController::class, 'index'])->name('home');
//});



//Route::get('/', function () {
//    return view('auth.login');
//});

Auth::routes();

// تجميع الـ Routes بدون تعارض
Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('person.search', [PersonController::class, 'search'])->name('person.search');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route لتوجيه المستخدمين إلى الصفحة 'home2'
    Route::get('/home2', function () {
        $cities = \App\Models\City::all();
        $persons = \App\Models\Person::all();
        $depts = \App\Models\Depts::all();
        return view('home2', compact('cities', 'persons', 'depts'));
    })->name('home2');
});

// باقي الـ Routes العامة بدون middleware
Route::resource('city', CityController::class);
Route::resource('person', PersonController::class);
Route::resource('dept', DeptsController::class);





<?php

use App\Http\Controllers\BeersController;
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
    return view('welcome');
});

Route::get('beer/{id?}', [BeersController::class, "read"]);
Route::post('beer/create', [BeersController::class, "create"]);
Route::delete('beer/{id}', [BeersController::class, "delete"]);
Route::get('beer/{id}/update', [BeersController::class, "showUpdate"]);
Route::put('beer/{id}', [BeersController::class, 'update']);

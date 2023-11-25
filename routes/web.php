<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

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

Route::get('/testes', [EventController::class, 'testes']);
Route::get('/events/create', [EventController::class, 'create']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/produtos', function () {
    $search = request('search');

    return view('products', ['search' => $search]);
});

Route::get('/produtos-detalhes/{id}', function ($id = null) {
    return view('product', ['id' => $id]);
});











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

Route::get('/', function () {
    $nomeRota = "Rafael";
    $idade = 29;
    $nomeRota2 = "Jose";
    $array = [34,35,36,37,38];
    $nomes = ["Pedro", "Gustavo", "Joao", "Antonio"];

    return view('welcome', 
        [
            'nomeView' => $nomeRota,
             'idade'=> $idade,
              'nomeView2' => $nomeRota2,
              'arrayView' => $array,
              'nomesView' => $nomes
        ]
    );
});

Route::get('/contato', function () {
    return view('contato');
});

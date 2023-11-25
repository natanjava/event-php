<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {

    }


    public function testes () {

        $nomeRota = "Rafael";
        $idade = 29;
        $nomeRota2 = "Jose";
        $array = [34,35,36,37,38];
        $nomes = ["Pedro", "Gustavo", "Joao", "Antonio"];
    
        return view('testes', 
            [
                'nomeView' => $nomeRota,
                 'idade'=> $idade,
                  'nomeView2' => $nomeRota2,
                  'arrayView' => $array,
                  'nomesView' => $nomes
            ]
        );
    }

    public function create () {
        return view ('events.create');
    }
}

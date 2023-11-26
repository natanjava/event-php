<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();  
        return view ('welcome', ['events' => $events]);
    }

    public function create () {
        return view ('events.create');
    }

    public function store(Request $request) {
        $event = new Event;
        
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        
        $event->save();

        return redirect("/");

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


}

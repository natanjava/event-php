<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }        
    
        return view('welcome',['events' => $events, 'search' => $search]);
    }

    public function create () {
        return view ('events.create');
    }

    public function store(Request $request) {
        $event = new Event;
        
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private; 
        $event->description = $request->description;
        $event->items = $request->items;
        
        //Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid() ) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            // generate a name with method Hash
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);  
            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;
                      
        $event->save();

        return redirect("/")->with('msg', 'Event created successfully!');
    }


    public function show($id) {

        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {

            $userEvents = $user->eventAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }

        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
        
    }

    public function dashboard() {

        $user = auth()->user();
        $events = $user->events;
        $eventAsParticipant = $user->eventAsParticipant;
        return view('events.dashboard', ['events' => $events, 'eventAsParticipant' => $eventAsParticipant]);

    }

    public function destroy($id) {

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Event sucessfolly deleted!');
    }

    public function edit($id) {

        $user = auth()->user();

        $event = Event::findOrFail($id);

        if($user->id == $event->user_id) {
            return view('events.edit', ['event' => $event]);
            
        }
        else {
            return redirect('/dashboard');
        }       
    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            // $event->image = $imageName;
            $data['image'] = $imageName;

        }

        //Event::findOrFail($request->id)->update($request->all());
        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Event Updated successfully!');

    }

    public function joinEvent($id) {

        $user = auth()->user();
        $user->eventAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Your presence is confirmed at the event ' . $event->title);
    }


    public function leaveEvent($id) {

        $user = auth()->user();
        $user->eventAsParticipant()->detach($id);
        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'You left the event: ' . $event->title);

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


@extends('layouts.main')

@section('title', 'Events Managment')

@section('content')
             
        <div id="search-container" class="col-md-12">
                <h1>Search an Event</h1>
                <form action="/" method="GET">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                </form>
        </div>
        

        <div id="events-container" class="col-md-12">
                @if($search)
                        <h2>Searching for: {{ $search }}</h2>
                @else
                        <h2>Next Events</h2>
                        <p class="subtitle">See the events of the next few days</p>
                @endif
                
                <div id="card-container" class="row">
                        @foreach($events as $event)
                                <div class="card col-md-3">
                                        @if($event->image)
                                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title}}" >
                                        @else
                                        <img src="/img/without-Image.jpg" class="without-Image" alt="Default Image">
                                        @endif
                                        
                                        <div class="card-body">
                                                <p class="card-date"> {{ date('d/m/Y'), strtotime($event->date) }}</p>
                                                <h5 class="card-title">{{ $event->title }}</h5>
                                                <p class="card-participants"> {{ count($event->users) }} Participants</p>
                                                <a href="/events/{{ $event->id }}" class="btn btn-primary">Learn more</a>
                                        </div>
                                </div>
                        @endforeach


                        @if(count($events) == 0 && $search)
                                <p>It was unable to find any events with: {{ $search }}. <br><a href="/">See all.</a></p>
                        @elseif(count($events) == 0)
                                <p>There are no available events. </p>
                        @endif
                </div>
        </div>

             
@endsection

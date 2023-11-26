
@extends('layouts.main')

@section('title', 'Events Managment')

@section('content')


        <div id="search-container" class="col-md-12">
                <h1>Search an Event</h1>
                <form action="">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                </form>

        </div>
        

        <div id="events-container" class="col-md-12">
                <h2>Next Events</h2>
                <p class="subtitle">See the events of the next few days</p>
                <div id="cars-container" class="row">
                        @foreach($events as $event)
                                <div class="card col-md-3">
                                        <img src="/img/banner3.jpg" alt="{{ $event->title}}" >
                                        <div class="card-body">
                                                <p class="card-date">10/09/2020</p>
                                                <h5 class="card-title">{{ $event->title }}</h5>
                                                <p class="card-participants">X Participants</p>
                                                <a href="#" class="btn btn-primary">Learn more</a>
                                        </div>
                                </div>

                        @endforeach
                </div>
        </div>

             
@endsection

@extends('layouts.main')

@section('title', $event->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
      </div>
      
      <div id="info-container" class="col-md-6">
        <h1>{{ $event->title }}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
        <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participants</p>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Owner: {{ $eventOwner['name'] }}</p>

         @if(!$hasUserJoined)
         <form action="/events/join/{{ $event->id }}" method="POST">
            @csrf
            <a href="/events/join/{{ $event->id }}" 
              class="btn btn-primary" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Confirm Attendance
            </a>
         </form>
         @else
         <p class="already-joined-msg">You are already attending this event!</p>
         @endif

        <h3>Event features:</h3>
        <ul id="items-list">
          @foreach($event->items as $item)
            <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
          @endforeach
        </ul>
      </div>
      
      <div class="col-md-12" id="description-container">
        <h3>About the event:</h3>
        <p class="event-description">{{ $event->description }}</p>
      </div>

      <div class="col-md-12" id="description-container">
        
        @if (count($participants) > 0)
          <h3>Participants</h3>
          
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th> 
                <th scope="col">Email</th>
              <tr>  
            </thead>
            <tbody>
              @foreach ($participants as $participant)
                <tr>
                  <td scropt="row">{{ $loop->index + 1 }}</td>
                  <td>{{ $participant->name }}</td>
                  <td>{{ $participant->email }}</td>

                </tr>
              @endforeach
            </tbody>
          </table>
          

        @endif    
      </div>
    </div>
  </div>

@endsection
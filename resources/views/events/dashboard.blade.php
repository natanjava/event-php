@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h3>My events</h3>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Participants</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td> {{ count($event->users) }}</td>
                        <td>
                            <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Update</a> 
                            <form action="/events/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Delete</button>
                            </form>                      
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
        @else
            <p>You don't have events yet. <a href="/events/create">Create event.</a></p>
        @endif
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Events that i am attending</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventAsParticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Participants</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventAsParticipant as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>{{ count($event->users) }}</td>
                    <td>
                        <form action="/events/leave/{{ $event->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger delete-btn">
                                <ion-icon name="trash-outline"></ion-icon> 
                                Leave Event
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>You haven't participated in any events yet. <a href="/">See all the events.</a></p>
    @endif
    </div>

@endsection
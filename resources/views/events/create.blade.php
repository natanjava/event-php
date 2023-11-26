@extends('layouts.main')

@section('title', 'Create Event')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Create your event</h1>
        <form action="/events" method="POST">
            @csrf
            <div id="form-group">
                <label for="title">Event:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Name of the event">
            </div>
            <div id="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Place of the event">
            </div>
            <div id="form-group">
                <label for="private">Is the event private?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div id="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" placeholder="What will happens at the Event?" ></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Create event" >
        </form>
    </div>

@endsection
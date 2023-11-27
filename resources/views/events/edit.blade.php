@extends('layouts.main')

@section('title', 'Update Event: ' . $event->title)

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Update your event: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="form-group">
                <label for="image">Image of event:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div id="form-group">
                <label for="title">Event:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Name of the event" value="{{ $event->title }}">
            </div>
            <div id="form-group">
                <label for="date">Date of event:</label>
                <input type="date" class="form-control-file" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div id="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Place of the event" value="{{ $event->city }}">
            </div>
            <div id="form-group">
                <label for="private">Is the event private?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">No</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Yes</option>
                </select>
            </div>
            <div id="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" placeholder="What will happens at the Event?" >{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
            <label for="title">Add infrastructure items:</label>
            <div class="form-group">	
                <input type="checkbox" name="items[]" value="Chairs"> Chairs
            </div>
            <div class="form-group">	
                <input type="checkbox" name="items[]" value="Stage"> Stage
            </div>
            <div class="form-group">	
                <input type="checkbox" name="items[]" value="Open bar"> Open bar
            </div>
            <div class="form-group">	
                <input type="checkbox" name="items[]" value="Open Food"> Open food
            </div>
            <div class="form-group">	
                <input type="checkbox" name="items[]" value="Souvenirs"> souvenirs
            </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Update event" >
        </form>
    </div>

@endsection
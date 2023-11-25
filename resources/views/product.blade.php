@extends('layouts.main')

@section('title', 'Produto')

@section('content')
    @if ($id != null)
        <p>Printing product id: {{ $id }}</p>        
    @endif

    @if ($id == '')
        <p>nothing</p>        
    @endif


@endsection
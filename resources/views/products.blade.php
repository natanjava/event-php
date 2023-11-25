@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
<h1>Tela de Produtos</h1>

@if ($search != '')
    <p> The user is searching for: {{$search}}</p>
@endif

@endsection
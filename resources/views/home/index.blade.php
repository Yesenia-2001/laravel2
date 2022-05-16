@extends('layouts.app-master')

@section('content')
     <h1>Home</h1> 
    
    @auth
        <p>Bienvenido {{auth()->user()->username}}</p>
        <a href="/logout">Logout</a>          
    @endauth

    @guest
        <p>Para ver el contenido <a href="/login">Inicia sesión</a></p>
    @endguest
@endsection

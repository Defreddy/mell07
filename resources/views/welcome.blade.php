@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Mello</h1>
    <p><em>Trello for minimalists.</em></p>
    @guest
        <a href="{{ route('login') }}">Log in</a> or <a href="{{ route('register') }}">register</a> to get started.    
    @else
        <a class="btn btn-primary" href="{{ route('tasks') }}">See your tasks</a>
    @endguest
</div>
@endsection

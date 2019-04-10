@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Spiel bearbeiten</h5>
        <hr class="border-primary mb-4">

        @include('_errors')

        <form method="POST" action="{{ route('games.update', compact('game')) }}">
            @method('PATCH')
            {{ csrf_field() }}
            @include('games/_form')
        </form>
    </div>
@endsection
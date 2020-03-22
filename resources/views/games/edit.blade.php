@extends('layouts.app')

@section('content')
    @component('components.hero')
        <h2 class="title is-2">Spiel bearbeiten</h2>

        <form method="POST" action="{{ route('games.update', compact('game')) }}" class="box">
            @include('_errors')
            @method('PATCH')
            {{ csrf_field() }}
            @include('games/_form')
        </form>
    @endcomponent
@endsection

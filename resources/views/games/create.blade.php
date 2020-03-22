@extends('layouts.app')

@section('content')
    @component('components.hero')
        <h2 class="title is-2">Neues Spiel</h2>

        <form method="POST" action="{{ route('games.store') }}" class="box">
            {{ csrf_field() }}
            @include('games/_form')
        </form>
    @endcomponent
@endsection

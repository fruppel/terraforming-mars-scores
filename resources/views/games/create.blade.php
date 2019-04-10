@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Neues Spiel</h5>
        <hr class="border-primary mb-4">

        @include('_errors')

        <form method="POST" action="{{ route('games.store') }}">
            {{ csrf_field() }}
            @include('games/_form')
        </form>
    </div>
@endsection
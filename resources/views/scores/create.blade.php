@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>{{ $player ? $player->display_name . ' hinzufügen' : 'Neuer Spieler'  }}</h5>
        <hr class="border-primary mb-4">

        @include('_errors')

        <form method="POST" action="{{ route('scores.store', compact('game')) }}">
            @csrf
            @if (!$player)
            <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="display_name" class="col-sm-2 col-form-label">Spitzname</label>
                <div class="col-sm-10">
                    <input type="text" id="display_name" name="display_name" class="form-control" value="{{ old('display_name') }}">
                </div>
            </div>
            <hr class="border-secondary mb-4">
            @else
                <input type="hidden" name="player_id" value="{{ $player->id }}">
            @endif
            <div class="form-group row">
                <label for="corporation_id" class="col-sm-2 col-form-label">Konzern</label>
                <div class="col-sm-10">
                    <select id="corporation_id" name="corporation_id" class="form-control">
                        <option disabled selected>Bitte wählen</option>
                        <option value="1">Anfänger-Konzern</option>
                        @foreach ($corporations as $corporation)
                            <option value="{{ $corporation->id }}">{{ $corporation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary mr-1">Speichern</button>
                    <a href="{{ route('games.index') }}" class="btn btn-secondary">Abbrechen</a>
                </div>
            </div>
        </form>
    </div>
@endsection
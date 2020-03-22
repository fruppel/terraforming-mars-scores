@extends('layouts.app')

@section('content')
    @component('components.hero')
        <h2 class="title is-2">{{ $player ? $player->display_name . ' hinzufügen' : 'Neuer Spieler'  }}</h2>

        <form method="POST" action="{{ route('scores.store', compact('game')) }}" class="box">
            @csrf

            @if (!$player)
                @input(['name' => 'full_name', 'label' => 'Name'])
                @input(['name' => 'display_name', 'label' => 'Name'])
            @else
                <input type="hidden" name="player_id" value="{{ $player->id }}">
            @endif
            <div class="field">
                <label for="corporation_id" class="label">Konzern</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="corporation_id" id="corporation_id">
                            <option disabled selected>Bitte wählen</option>
                            <option value="1">Anfänger-Konzern</option>
                            @foreach ($corporations as $corporation)
                                <option value="{{ $corporation->id }}">{{ $corporation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @component('components.error_field', ['fieldName' => 'corporation_id']) @endcomponent
            </div>
            <div class="field">
                <div class="buttons">
                    <button type="submit" class="button is-primary">Speichern</button>
                    <a href="{{ route('games.index') }}" class="button is-danger is-outlined">Abbrechen</a>
                </div>
            </div>
        </form>
    @endcomponent
@endsection

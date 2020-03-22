@extends('layouts.app')

@section('content')
    @component('components.hero')
        <h2 class="title is-2">{{ $score->player->display_name . ' bearbeiten'  }}</h2>

        <form method="POST" action="{{ route('scores.update', compact('game', 'score')) }}" class="box">
            @method('PATCH')
            @csrf
            <div class="field">
                <label for="corporation_id" class="label">Konzern</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="corporation_id" id="corporation_id">
                            <option value="1" {{ (int) $score->corporation_id === 1 ? 'selected' : '' }}>Anfänger-Konzern</option>
                            @foreach ($corporations as $corporation)
                                <option value="{{ $corporation->id }}" {{ (int) $score->corporation_id === $corporation->id ? 'selected' : '' }}>{{ $corporation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @component('components.error_field', ['fieldName' => 'corporation_id']) @endcomponent
            </div>
            @input(['name' => 'tr', 'label' => 'TW', 'value' => $score->tr, 'type' => 'number'])
            @input(['name' => 'awards', 'label' => 'Auszeichnungen', 'value' => $score->awards, 'type' => 'number'])
            @input(['name' => 'milestones', 'label' => 'Meilensteine', 'value' => $score->milestones, 'type' => 'number'])
            @input(['name' => 'gameboard', 'label' => 'Spielbrett', 'value' => $score->gameboard, 'type' => 'number'])
            @input(['name' => 'cards', 'label' => 'Karten', 'value' => $score->cards, 'type' => 'number'])
            @input(['name' => 'megacredits', 'label' => 'Megacredits', 'value' => $score->megacredits, 'type' => 'number'])

            <div class="field">
                <div class="buttons">
                    <button type="submit" class="button is-primary">Speichern</button>
                    <a href="{{ route('games.show', compact('game')) }}" class="button is-danger is-outlined">Abbrechen</a>
                </div>
            </div>
        </form>

    @endcomponent
@endsection

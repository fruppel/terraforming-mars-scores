@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>{{ $score->player->display_name . ' bearbeiten'  }}</h5>
        <hr class="border-primary mb-4">

        <form method="POST" action="{{ route('scores.update', compact('game', 'score')) }}">
            @method('PATCH')
            @csrf

            <div class="form-group row">
                <label for="corporation_id" class="col-sm-2 col-form-label">Konzern</label>
                <div class="col-sm-10">
                    <select id="corporation_id" name="corporation_id" class="form-control">
                        @foreach ($corporations as $corporation)
                            <option value="{{ $corporation->id }}" {{ (int) $score->corporation_id === $corporation->id ? 'selected' : '' }}>{{ $corporation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tr" class="col-sm-2 col-form-label">TW</label>
                <div class="col-sm-10">
                    <input type="number" name="tr" id="tr" class="form-control" value="{{ $score->tr }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="awards" class="col-sm-2 col-form-label">Auszeichnungen</label>
                <div class="col-sm-10">
                    <input type="number" name="awards" id="awards" class="form-control" value="{{ $score->awards }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="milestones" class="col-sm-2 col-form-label">Meilensteine</label>
                <div class="col-sm-10">
                    <input type="number" name="milestones" id="milestones" class="form-control" value="{{ $score->milestones }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="gameboard" class="col-sm-2 col-form-label">Spielbrett</label>
                <div class="col-sm-10">
                    <input type="number" name="gameboard" id="gameboard" class="form-control" value="{{ $score->gameboard }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="cards" class="col-sm-2 col-form-label">Karten</label>
                <div class="col-sm-10">
                    <input type="number" name="cards" id="cards" class="form-control" value="{{ $score->cards }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="megacredits" class="col-sm-2 col-form-label">MegaCredits</label>
                <div class="col-sm-10">
                    <input type="number" name="megacredits" id="megacredits" class="form-control" value="{{ $score->megacredits }}">
                </div>
            </div>



            <div class="form-group row mt-4">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary mr-1">Speichern</button>
                    <a href="{{ route('games.show', compact('game')) }}" class="btn btn-secondary">Abbrechen</a>
                </div>
            </div>
        </form>
    </div>
@endsection
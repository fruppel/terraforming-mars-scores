@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>{{ $player->display_name . ' bearbeiten'  }}</h5>
        <hr class="border-primary mb-4">

        <form method="POST" action="{{ route('games.players.update', compact('game')) }}">
            @method('PATCH')
            @csrf

            <div class="form-group row">
                <label for="corporation_id" class="col-sm-2 col-form-label">Konzern</label>
                <div class="col-sm-10">
                    <select id="corporation_id" name="corporation_id" class="form-control">
                        @foreach ($corporations as $corporation)
                            <option value="{{ $corporation->id }}">{{ $corporation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
@endsection
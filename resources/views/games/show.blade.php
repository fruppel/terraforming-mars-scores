@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Spiel #{{ $game->id }}</h5>
        <small>{{ $game->germanDate }} | {{ $game->map->name }}</small>
        <hr class="border-primary mb-4">

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Konzern</th>
                    <th class="border-top-0">TW</th>
                    <th class="border-top-0">Auszeichnungen</th>
                    <th class="border-top-0">Meilensteine</th>
                    <th class="border-top-0">Spielbrett</th>
                    <th class="border-top-0">Karten</th>
                    <th class="border-top-0 text-center"><u>Ergebnis</u></th>
                    <th class="border-top-0 text-center">M€</th>
                    <th class="border-top-0 text-right">Aktionen</th>
                </tr>
                @foreach ($scores as $score)
                    <tr {{ $game->winner_player_id === $score->player->id ? 'class=table-light' : '' }}>
                        <td>{{ $score->player->display_name }}</td>
                        <td>{{ $score->corporation->name }}</td>
                        <td>{{ $score->tr }}</td>
                        <td>{{ $score->awards }}</td>
                        <td>{{ $score->milestones }}</td>
                        <td>{{ $score->gameboard }}</td>
                        <td>{{ $score->cards }}</td>
                        <td class="text-right">{{ $score->result }}</td>
                        <td class="text-right">{{ $score->megacredits }}</td>
                        <td class="text-right">
                            <a class="btn btn-secondary btn-sm" href="{{ route('scores.edit', compact('game', 'score')) }}"><i class="oi oi-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="row">
            <div class="col-sm-4 mt-3">
                <form method="GET" action="{{ route('scores.create', $game) }}">
                    @csrf
                    <select name="player_id" class="custom-select" onchange="this.form.submit()">
                        <option value="" disabled selected>Spieler hinzufügen</option>
                        <option value="0">Neuer Spieler</option>
                        @foreach ($players as $player)
                            <option value="{{ $player->id }}">{{ $player->display_name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-sm-4 ml-sm-auto mt-3 text-right">
                <calculate-button href="{{ route('games.calculate', compact('game')) }}">Berechnen</calculate-button>
            </div>
        </div>


    </div>
@endsection
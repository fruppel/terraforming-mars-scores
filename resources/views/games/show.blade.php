@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h2 class="title is-2">
                Spiel #{{ $game->id }}
            </h2>
            <h3 class="subtitle is-3">
                {{ $game->germanDate }} | {{ $game->map->name }}
            </h3>

            <div class="table-container">
                <table class="table is-striped is-narrow-mobile is-fullwidth">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Konzern</th>
                        <th>TW</th>
                        <th>Auszeichnungen</th>
                        <th>Meilensteine</th>
                        <th>Spielbrett</th>
                        <th>Karten</th>
                        <th class="has-text-centered"><u>Ergebnis</u></th>
                        <th class="has-text-centered">M€</th>
                        <th class="has-text-right">Aktionen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($scores as $score)
                        <tr {{ $game->winner_player_id === $score->player->id ? 'class=table-light' : '' }}>
                            <td>{{ $score->player->display_name }}</td>
                            <td>{{ $score->corporation->name }}</td>
                            <td>{{ $score->tr }}</td>
                            <td>{{ $score->awards }}</td>
                            <td>{{ $score->milestones }}</td>
                            <td>{{ $score->gameboard }}</td>
                            <td>{{ $score->cards }}</td>
                            <td class="has-text-right">{{ $score->result }}</td>
                            <td class="has-text-right">{{ $score->megacredits }}</td>
                            <td class="has-text-right">
                                <div class="buttons is-right">
                                    <a class="button is-small is-outlined" href="{{ route('scores.edit', compact('game', 'score')) }}">
                                        <span class="oi" data-glyph="pencil"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">

                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="box">
                <div class="columns is-mobile">
                    <div class="column">
                        <form method="GET" action="{{ route('scores.create', $game) }}">
                            @csrf
                            <div class="field is-small">
                                <label class="label is-hidden" for="player_id">Spieler hinuzfügen:</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="player_id" id="player_id" onchange="this.form.submit()">
                                            <option value="" disabled selected>Spieler hinzufügen</option>
                                            <option value="0">Neuer Spieler</option>
                                            @foreach ($players as $player)
                                                <option value="{{ $player->id }}">{{ $player->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="column has-text-right">
                        <calculate-button href="{{ route('games.calculate', compact('game')) }}">
                            <span class="oi" data-glyph="calculator"></span>
                        </calculate-button>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

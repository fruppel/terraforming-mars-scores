@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Spiele</h2>

            @if ($games->count() === 0)
                <p class="">Keine Spiele vorhanden</p>
            @else
                <div class="table-container">
                    <table class="table is-fullwidth is-striped">
                        <tr>
                            <th>#</th>
                            <th>Datum</th>
                            <th>Karte</th>
                            <th class="has-text-centered">Zeitalter der Konzerne</th>
                            <th class="has-text-centered">Konzerne Mini-Erweiterung</th>
                            <th class="has-text-centered">Anzahl Spieler</th>
                            <th class="has-text-right">Aktionen</th>
                        </tr>

                        @foreach($games as $game)
                            <tr>
                                <td>#{{ $game->id }}</td>
                                <td>{{ $game->germanDate }}</td>
                                <td>{{ $game->map->name }}</td>
                                <td class="has-text-centered">
                                    @if($game->corporate_area)
                                        <span class="oi has-text-success" data-glyph="circle-check"></span>
                                    @else
                                        <span class="oi has-text-danger" data-glyph="circle-x"></span>
                                    @endif
                                </td>
                                <td class="has-text-centered">
                                    @if($game->corporate_mini_extension)
                                        <span class="oi has-text-success" data-glyph="circle-check"></span>
                                    @else
                                        <span class="oi has-text-danger" data-glyph="circle-x"></span>
                                    @endif
                                </td>
                                <td class="has-text-centered">{{ count($game->scores) }}</td>
                                <td class="has-text-right">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary" href="{{ route('games.show', compact('game')) }}">
                                            <span class="oi" data-glyph="eye"></span>
                                        </a>
                                        <a class="button is-small is-outlined" href="{{ route('games.edit', compact('game')) }}">
                                            <span class="oi" data-glyph="pencil"></span>
                                        </a>
                                        <a class="button is-small is-outlined is-danger" href="">
                                            <span class="oi" data-glyph="trash"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection


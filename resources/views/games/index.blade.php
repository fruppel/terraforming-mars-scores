@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <h5>Spiele</h5>
            <div class="ml-auto">
                <a href="{{ route('games.create') }}" class="btn btn-primary btn-sm"><i class="oi oi-plus"></i> Neu</a>
            </div>

        </div>

        <hr class="border-primary mb-4">

        @if ($games->count() === 0)
            <p>Keine Spiele vorhanden</p>
        @else
        <table class="table">
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Datum</th>
                <th class="border-top-0">Karte</th>
                <th class="border-top-0 text-center">Zeitalter der Konzerne</th>
                <th class="border-top-0 text-center">Konzerne Mini-Erweiterung</th>
                <th class="border-top-0 text-center">Anzahl Spieler</th>
                <th class="border-top-0 text-right">Aktionen</th>
            </tr>

            @foreach($games as $game)
                <tr>
                    <td>#{{ $game->id }}</td>
                    <td>{{ $game->germanDate }}</td>
                    <td>{{ $game->map->name }}</td>
                    <td class="text-center">
                        @if($game->corporate_area)
                            <i class="oi oi-circle-check text-success"></i>
                        @else
                            <i class="oi oi-circle-x text-danger"></i>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($game->corporate_mini_extension)
                            <i class="oi oi-circle-check text-success"></i>
                        @else
                            <i class="oi oi-circle-x text-danger"></i>
                        @endif
                    </td>
                    <td class="text-center">{{ count($game->scores) }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('games.show', compact('game')) }}"><i class="oi oi-eye"></i></a>
                        <a class="btn btn-secondary btn-sm" href="{{ route('games.edit', compact('game')) }}"><i class="oi oi-pencil"></i></a>
                        <a class="btn btn-danger btn-sm" href=""><i class="oi oi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif


    </div>
@endsection


<?php

namespace App\Http\Controllers;

use App\Game;
use App\Map;
use App\Player;
use App\Score;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game = new Game();
        $game->date = Carbon::now()->format('Y-m-d\TH:i:s');

        $maps = Map::all();

        return view('games.create', compact('game', 'maps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'map_id' => 'required',
        ]);

        $game = Game::create([
            'user_id' => auth()->id(),
            'date' => $request->get('date'),
            'map_id' => $request->get('map_id'),
            'corporate_area' => !!$request->get('corporate_area'),
        ]);

        return redirect(route('games.show', compact('game')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $scores = Score::where('game_id', '=', $game->id)
            ->orderByDesc('result')
            ->orderByDesc('megacredits')
            ->get();

        $players = Player::whereNotIn('id', $scores->pluck('player_id'))
            ->orderBy('display_name')
            ->get();

        return view('games.show', compact('game', 'scores', 'players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $maps = Map::all();

        return view('games.edit', compact('game', 'maps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $this->validate($request, [
            'date' => 'required|date',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }

    public function calculate(Game $game)
    {
        $winner = null;

        foreach ($game->scores as $score) {
            /** @var Score $score */
            $result = $score->tr + $score->awards + $score->milestones + $score->gameboard + $score->map + $score->cards;
            $score->update([
                'result' => $result,
            ]);

            if (!$winner || $result >= $winner->result) {

                if ($winner && $result == $winner->result && $score->megacredits < $winner->megacredits) {
                    continue;
                }

                $winner = $score;
            }

        }

        $game->update([
            'winner_player_id' => $winner->player->id,
        ]);

        return back();
    }
}

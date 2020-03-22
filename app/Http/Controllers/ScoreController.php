<?php

namespace App\Http\Controllers;

use App\Corporation;
use App\Game;
use App\Player;
use App\Score;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ScoreController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Game|null $game
     *
     * @return Factory|View
     */
    public function create(Request $request, Game $game = null)
    {
        $playerId = (int) $request->get('player_id');
        $player = 0;

        if ($playerId > 0) {
            $player = Player::where('id', $playerId)->firstOrFail();
        }

        $corporations = Corporation::where('id', '!=', 1)->get();

        return view('scores.create', compact('game', 'player', 'corporations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Game $game
     *
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request, Game $game)
    {
        $this->validate($request, [
            'corporation_id' => 'required'
        ]);

        $playerId = $request->get('player_id');

        if (is_null($playerId)) {
            $player = $this->createNewPlayer($request);
            $playerId = $player->id;
        }

        Score::create([
            'game_id' => $game->id,
            'player_id' => $playerId,
            'corporation_id' => $request->get('corporation_id')
        ]);

        return redirect(route('games.show', compact('game')));
    }

    public function edit(Game $game, Score $score)
    {
        $corporations = Corporation::where('id', '!=', 1)->get();

        return view('scores.edit', compact('game', 'score', 'corporations'));
    }

    public function update(Request $request, Game $game, Score $score)
    {
        $this->validate($request, [
            'corporation_id' => 'required'
        ]);

        $score->update([
            'corporation_id' => $request->get('corporation_id'),
            'tr' => $request->get('tr'),
            'awards' => $request->get('awards'),
            'milestones' => $request->get('milestones'),
            'gameboard' => $request->get('gameboard'),
            'cards' => $request->get('cards'),
            'megacredits' => $request->get('megacredits'),
        ]);

        return redirect(route('games.show', compact('game')));
    }

    /**
     * Creates a new player
     *
     * @param Request $request
     * @return Player
     * @throws ValidationException
     */
    private function createNewPlayer(Request $request): Player
    {
        $this->validate($request, [
            'full_name' => 'required|max:100',
            'display_name' => 'required|max:100',
        ]);

        return Player::create([
            'full_name' => $request->get('full_name'),
            'display_name' => $request->get('display_name'),
        ]);
    }

}

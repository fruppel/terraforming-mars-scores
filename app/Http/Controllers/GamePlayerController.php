<?php

namespace App\Http\Controllers;

use App\Corporation;
use App\Game;
use App\GamePlayer;
use App\Player;
use Illuminate\Http\Request;

class GamePlayerController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function show(GamePlayer $gamePlayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(GamePlayer $gamePlayer)
    {
        $player = $gamePlayer;
        dd($player);
        return view('games.players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GamePlayer $gamePlayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GamePlayer  $gamePlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(GamePlayer $gamePlayer)
    {
        //
    }

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

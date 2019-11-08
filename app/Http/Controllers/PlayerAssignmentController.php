<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
use Illuminate\Http\Request;

class PlayerAssignmentController extends Controller
{
    public function store(Request $request) {
        
        $game = Game::findOrFail(request('game'));
        $player = $game->players->find(request('player'));
        if(!$player) {
            $player = Player::find(request('player'));
            $game->players()->save($player);
        }
        return redirect('/game/'.request('game'));
    }

    public function update(Request $request) {
        
    }

    public function destroy($game, $player) {
        $my_game = Game::findOrFail($game);
        $my_player = $my_game->players()->detach($player);    

        return redirect('/game/'.request('game'));
    }
}

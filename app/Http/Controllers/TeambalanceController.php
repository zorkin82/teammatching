<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class TeambalanceController extends Controller
{
    public function store(Request $request) {

        $game = Game::findOrFail(request('game'));
        $players = $game->players()->get()->sortByDesc('strength');
        foreach($players as $player) {
            $game->players()->updateExistingPivot($player->id, ['team' => null]);
        }

        $teamA = collect();
        $teamB = collect();

        foreach ($players as $player) {
            if($teamA->sum('strength') == $teamB->sum('strength')) {
                $teamA->add($player);
            } elseif ($teamA->sum('strength') > $teamB->sum('strength')) {
                $teamB->add($player);
            } else {
                $teamA->add($player);
            }

        }

        foreach($teamA as $playerA) {
            $game->players()->updateExistingPivot($playerA->id, ['team' => 'A']);
        }

        foreach($teamB as $playerB) {
            $game->players()->updateExistingPivot($playerB->id, ['team' => 'B']);
        }
        
        return redirect('/game/'.$game->id);
    }
}

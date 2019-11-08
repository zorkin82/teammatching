<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $games = Game::all()->sortByDesc('name');
        // $canCreateGame = !$this->isNextGameCreated($this->getNextGameDate(Carbon::now())->toDateString());
        $canCreateGame = true;
        return view('game.index', compact('games','canCreateGame'));
    }

    public function create()
    {
       // $name = Carbon::now()->toDateTimeString();
        $game = new Game();
        $game->name = "2019-10-26";
        $game->save();


        return redirect("/game");


        // $name = $this->getNextGameDate(Carbon::now())->toDateString();
        // if(!$this->isNextGameCreated($name)) {
        //     $game = new Game();
        //     $game->name = $name;
        //     $game->save();
        //     return redirect("/game");

        // } else {
        //     dd("Already created");
        // }


    }

    public function show(Game $game) {
        $free_players = $game->players()->get()->sortBy('name');
        $all_players = Player::all();

        $teamA = $game->players()->wherePivot('team', '=', "A")->get()->sortByDesc('strength');
        $teamB = $game->players()->wherePivot('team', '=', "B")->get()->sortByDesc('strength');
        $missing_players = $all_players->diff($free_players)->sortBy('name');
        $missing_players->all();
        return view('game.show', compact('game', 'free_players', 'missing_players', 'teamA', 'teamB'));
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect("/game");
    }

    // protected function getNextGameDate(Carbon $date ){
    //     // $now = Carbon::now();
    //     // $now = Carbon::parse('2019-10-26');
    //     if ($date->dayOfWeek == 6) {
    //         $name = Carbon::now();
    //     } else {
    //         $name = Carbon::now()->modify("next saturday");
    //     }
    //     return $name;
    // }

    // protected function isNextGameCreated($name) {
    //     return Game::where('name', $name)->count() == 1 ;
    // }

}

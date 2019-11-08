<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all()->sortByDesc('strength');

        // $teamA = collect();
        // $teamB = collect();

        // foreach ($players as $player) {
        //     if($teamA->sum('strength') == $teamB->sum('strength')) {
        //         $teamA->add($player);
        //     } elseif ($teamA->sum('strength') > $teamB->sum('strength')) {
        //         $teamB->add($player);
        //     } else {
        //         $teamA->add($player);
        //     }

        // }
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = new Player();
        $player->name = request('name');
        $player->strength = request('strength');

        $player->save();
        
        return redirect("/player");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('player.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('player.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Player $player)
    public function update($id)
    {
        $player = Player::findOrFail($id);
        $player->name = request('name');
        $player->strength = request('strength');

        $player->save();
        
        return redirect("/player");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect("/player");
    }
}

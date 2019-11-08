<?php

use App\Game;
use App\Player;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Player::class, 50)->create();
        factory(App\Game::class, 2)->create();
        $this->call([
            YetiSeeder::class
        ]);

        $players = Player::all()->pluck('id')->shuffle()->take(19);
        foreach ($players as $player) {
                Game::first()->players()->attach($player);
        }

    }


    private function getRandomPlayerId() {
        return \App\Player::inRandomOrder()->first();
    }

}

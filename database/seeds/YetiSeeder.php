<?php

use App\Player;
use Illuminate\Database\Seeder;

class YetiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createYetiPlayers();
    }


    private function createYetiPlayers() {
        $players = array(
            array('strength' => 8,'name' => "Toni"),
            array('strength' => 8,'name' => "Matthias (Matze)"),
            array('strength' => 7,'name' => "Helmut"),
            array('strength' => 6,'name' => "Anton"),
            array('strength' => 6,'name' => "Brian"),
            array('strength' => 6,'name' => "Tim"),
            array('strength' => 6,'name' => "Dirk"),
            array('strength' => 6,'name' => "Thiemo"),
            array('strength' => 4,'name' => "Georg"),
            array('strength' => 4,'name' => "Thorsten"),
            array('strength' => 4,'name' => "Birgit"),
            array('strength' => 3,'name' => "Reinhold"),
            array('strength' => 3,'name' => "Tobi (Bayer)"),
            array('strength' => 3,'name' => "Rainer"),
            array('strength' => 3,'name' => "Mirian"),
            array('strength' => 2,'name' => "Siggi"),
            array('strength' => 1,'name' => "Arnold"),
            array('strength' => 1,'name' => "Sven"),
            array('strength' => 1,'name' => "Vladi"),
            array('strength' => 1,'name' => "Tristan"),
            array('strength' => 5,'name' => "Shamir"),
            array('strength' => 3,'name' => "Billy"),
            array('strength' => 4,'name' => "Radek"),
        );
        Player::insert($players);
    }
}

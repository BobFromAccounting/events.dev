<?php

class GamesTableSeeder extends Seeder {

	public function run()
	{
		$genres  = Config::get('genres');
        $devices = Config::get('devices');
        
        for($i = 0; $i < 17; $i += 1)
        {
            $game = new Game();
            $game->game_title  = "game $i";
            $game->device = $devices[$i];
            $game->genre  = $genres[$i];
            $game->save();
        }
	}
}
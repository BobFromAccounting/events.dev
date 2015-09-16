<?php

class GamesTableSeeder extends Seeder {

	public function run()
	{
        $i = 0;
        foreach (array_keys(Config::get('devices')) as $device) {
            foreach (array_keys(Config::get('genres')) as $genre) {
                $game = new Game();
                $game->game_title  = "game $i";
            
                $game->device = $device;
                $game->genre  = $genre;
                $game->save();

                $i++;
            }
        }
	}
}
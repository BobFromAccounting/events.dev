<?php

use Faker\Factory as Faker;
use Carbon\Carbon;

class CalendarEventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 25; $i += 1)
        {
            $event = new CalendarEvent();
            $event->start_time     = '2015-09-01 12:00:00';
            $event->end_time       = '2015-09-02 12:00:00';
            $event->title          = $faker->catchPhrase;
            $event->description    = $faker->text(100);
            $event->price          = '0';
            $event->user_id        = User::all()->random()->id;
            $event->location_id    = Location::all()->random()->id;
            $event->game_id        = Game::all()->random()->id;
            
            $event->save();

        }
	}

}
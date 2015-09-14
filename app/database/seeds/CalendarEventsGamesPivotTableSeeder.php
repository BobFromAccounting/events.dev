<?php

class CalendarEventsGamesPivotTableSeeder extends Seeder {

	public function run()
    {
        $events = CalendarEvent::all();

        foreach ($events as $event) {
            $event->games()->attach(Game::all()->random()->id);
        }
	}

}
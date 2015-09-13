<?php

use Faker\Factory as Faker;

class LocationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 20; $i += 1)
        {
            $venue = new Location();
            $venue->title   = $faker->company;
            $venue->address = $faker->streetAddress;
            $venue->city    = $faker->city;
            $venue->state   = $faker->stateAbbr;
            $venue->zip     = 78201;
            $venue->save();
        }
	}

}
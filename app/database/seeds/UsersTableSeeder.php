<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 50; $i += 1)
        {
            $user = new User();
            $user->first_name            = $faker->firstName;
            $user->last_name             = $faker->lastName;
            $user->email                 = $faker->safeEmail;
            $password                    = $faker->password;
            $user->password              = $password;
            $user->password_confirmation = $password;
            $user->save();
        }
	}

}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_events', function(Blueprint $table)
		{
			$table->increments('id');

			$table->datetime('start_time');
			$table->datetime('end_time');
			$table->string('title');
			$table->string('description');
			$table->decimal('price')->unsigned()->nullable();

			$table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');

			$table->integer('location_id')->unsigned();
		    $table->foreign('location_id')->references('id')->on('locations');

		    $table->softDeletes();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_events');
	}

}

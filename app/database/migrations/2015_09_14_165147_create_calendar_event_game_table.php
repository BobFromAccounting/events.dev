<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarEventGameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_event_game', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('calendar_event_id')->unsigned()->index();
			$table->foreign('calendar_event_id')->references('id')->on('calendar_events')->onDelete('cascade');
			$table->integer('game_id')->unsigned()->index();
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
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
		Schema::drop('calendar_event_game');
	}

}

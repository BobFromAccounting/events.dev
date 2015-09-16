<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /locations
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /locations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$location = Location::findOrFail($id);
		
		if (!$location){
			App::abort(404);
		}

		return View::make('events.show')->with('event', $event);
	}
}
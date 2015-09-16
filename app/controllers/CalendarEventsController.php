<?php

class CalendarEventsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /calendarevents
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = CalendarEvent::with('creator', 'location', 'game');

		$search = strtolower(Input::get('search'));

		if($search) {
			$query->where('title', 'like', '%' . $search . '%');
			$query->orWhere('description', 'like', '%' . $search . '%');
			$query->orWhereHas('creator', function($q) {
				$search = Input::get('search');
				$q->where('first_name', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('creator', function($q) {
				$search = Input::get('search');
				$q->where('last_name', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('location', function($q) {
				$search = Input::get('search');
				$q->where('title', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('location', function($q) {
				$search = Input::get('search');
				$q->where('address', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('location', function($q) {
				$search = Input::get('search');
				$q->where('city', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('location', function($q) {
				$search = Input::get('search');
				$q->where('state', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('game', function($q) {
				$search = Input::get('search');
				$q->where('game_title', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('game', function($q) {
				$search = Input::get('search');
				$q->where('genre', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('game', function($q) {
				$search = Input::get('search');
				$q->where('device', 'like', '%' . $search . '%');
			});
		}

		$events = $query->orderBy('created_at')->paginate(4);

		return View::make('events.index')->with('events', $events);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /calendarevents/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$locations = Location::all();

		$dropdown = [];
		$dropdown['-1'] = 'Add New Address';

		foreach($locations as $location) {
			$dropdown[$location->id] = $location->title;
		}

		return View::make('events.create')->with('dropdown', $dropdown);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /calendarevents
	 *
	 * @return Response
	 */
	public function store()
	{
		$event = new CalendarEvent();

		$location = new Location();

        // validation succeeded, create and save the event
		Log::info("Event created successfully.");

		Log::info("Log Message", array('context' => Input::all()));
	
		return $this->validateAndSave($event, $location);
	}

	/**
	 * Display the specified resource.
	 * GET /calendarevents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = CalendarEvent::findOrFail($id);
		
		if (!$event){
			
			Log::info('404', Input::all());

			App::abort(404);
		}

		Log::info(Input::all());

		return View::make('events.show')->with('event', $event);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /calendarevents/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = CalendarEvent::findOrFail($id);

		if (!$event) {
			App::abort(404);
		}
		
		return View::make('events.edit')->with('event', $event);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /calendarevents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$event = CalendarEvent::findOrFail($id);

		$location = Location::findOrFail($event->location_id);

		if (!$event) {
			App::abort(404);
		}
		
		return $this->validateAndSave($event, $location);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /calendarevents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$event = CalendarEvent::find($id);
		
		if (!$event){
			Log::info(Input::all());
			App::abort(404);
		}

		$event->delete();

		Log::info(Input::all());

		return  Redirect::action('CalendarEventsController@index');
	}

	public function validateAndSave($event, $location)
	{
		try {
			if (Input::get('location-dropdown') == '-1') {

		    	$location->title   = Input::get('location');
		    	$location->address = Input::get('address');
		    	$location->city    = Input::get('city');
		    	$location->state   = Input::get('state');
		    	$location->zip 	   = Input::get('zip');

		    	$location->saveOrFail();
		    } else {
		    	$location = Location::findOrFail(Input::get('location-dropdown'));
		    }

		    $game = Game::firstOrCreate(
		    	array(
		    		"device" 	 => Input::get('console'),
		    		"genre" 	 => Input::get('genre'),
		    		"game_title" => Input::get('game')
		    	)
	    	);

	    	$event->start_time  = Input::get('start_time');
	    	$event->end_time    = Input::get('end_time');
			$event->title  		= Input::get('title');
			$event->description = Input::get('description');
			$event->price 		= Input::get('price');
			
			$event->location_id = $location->id;
			$event->game_id 	= $game->id;
			$event->user_id 	= Auth::id();
			
			$event->saveOrFail();

			if (Request::wantsJson()) {
				return Response::json(array('Status' => 'Request Succeeded'));
	        } else {
				Session::flash('successMessage', 'Your event has been successfully saved.');

				return Redirect::action('CalendarEventsController@show', array($event->id));
			}


		} catch(Watson\Validating\ValidationException $e) {
			Session::flash('errorMessage',
				'Ohh no! Something went wrong. You should be seeing some errors down below.');

	    	Log::info('Validator failed', Input::all());

	        return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

	public function getManage() 
	{	
		return View::make('events/manage');
	}

	public function getList()
	{
		$events = CalendarEvent::with('creator', 'location')->get();

		return Response::json($events);
	}

}
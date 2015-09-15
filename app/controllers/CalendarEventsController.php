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
		$query = CalendarEvent::with('user', 'location');

		$search = strtolower(Input::get('search'));

		if($search) {
			$query->where('title', 'like', '%' . $search . '%');
			$query->orWhere('description', 'like', '%' . $search . '%');
			$query->orWhereHas('users', function($q) {
				$search = Input::get('search');
				$q->where('first_name', 'like', '%' . $search . '%');
			});
			$query->orWhereHas('user', function($q) {
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
		return View::make('events.create');
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
        // validation succeeded, create and save the event
		Log::info("Event created successfully.");

		Log::info("Log Message", array('context' => Input::all()));
	
		return $this->validateAndSave($event);
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

		if (!$event) {
			App::abort(404);
		}
		
		return $this->validateAndSave($event);
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

	public function validateAndSave($event)
	{
		// create the validator
	    $validator = Validator::make(Input::all(), CalendarEvents::$rules);

	    // attempt validation
	    if ($validator->fails()) {
	    	Session::flash('errorMessage', 'Ohh no! Something went wrong...You should be seeing some errors down below...');
	    	Log::info('Validator failed', Input::all());
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    } else {
	    	
			$event->title   = Input::get('title');
			$event->body    = Input::get('body');
			$event->user_id = Auth::id();
			$event->save();

			if (Request::wantsJson()) {
				 return Response::json(array('Status' => 'Request Succeeded'));
	        } else {
				Session::flash('successMessage', 'Your event has been successfully saved.');

				return Redirect::action('CalendarEventsController@show', array($event->id));
			}

		}
	}

	public function getManage() 
	{	
		return View::make('events/manage');
	}

	public function getList()
	{
		$events = CalendarEvent::with('user', 'location')->get();

		return Response::json($events);
	}

}
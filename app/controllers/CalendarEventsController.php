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
		$validator = Validator::make(Input::all(), Event::$rules);
		if($validator->fails()) {
			Log::info('Could not create post ', Input::all());
			// Session::flash('errorMessage', 'Uh-oh! Something went wrong. Check the errors below:');
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
        	$event = new Event();
			$event->title = Input::get('title');
			$event->body = Input::get('body');
			$event->user_id = Auth::id();
			$event->save();
			Log::info('Post was created successfully ', Input::all());
			// Session::flash('successMessage', 'You created ' . Input::get('title') . ' successfully!');
			return Redirect::action('CalendarEvenController@index');
		}
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
		$event = Event::find($id);
		// $user = $event->user;
		// $data = array(
		// 	'event' => $event,
		// 	'user' => $user
		// );
		if (!$event){
			Log::info('404', Input::all());
			// Session::flash('errorMessage', 'Page was not found.');
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
		$event = Event::find($id);
		Log::info(Input::all());
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
		$validator = Validator::make(Input::all(), Event::$rules);
		if($validator->fails()) {
			Log::info('Post was not edited successfully ', Input::all());
			Session::flash('errorMessage', 'Uh-oh! Something went wrong. Check the errors below:');
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$event = Event::find($id);
			$event->title = Input::get('title');
			$event->body = Input::get('body');
			$event->save();
			Log::info('Evenr was edited successfully ', Input::all());
			Session::flash('successMessage', 'You edited ' . Input::get('title') . ' successfully!');
			return Redirect::action('PostsController@index');
		}
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
		$event = Event::find($id);
		if (!$event){
			Log::info(Input::all());
			// Session::flash('errorMessage', 'Page was not found.');
			App::abort(404);
		}
		$event->delete();
		Log::info(Input::all());
		return  Redirect::action('EventsController@index');
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
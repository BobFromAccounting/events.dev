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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /calendarevents
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
		//
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
		//
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
		//
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
<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = User::all();

		$users = $query->order_by('create_at')->paginate(4);

		return View::make('users.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();

		Log::info('User Created Successfully');

		Log::info('Log Message', array('context', Input::all()));

		return $this->validateAndSave($user);
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		if (!$user) {
			Log::info('Log Message', '404 User Show Missing');
			App::abort(404);
		}

		return View::make('users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		
		if (!$user) {
			Log::info('Attempt to edit a non-user!');
			
			App::abort(404);
		}

		if ($user->id != Auth::id()) {
			Log::info('Attempt to edit account belonging to another user');

			App::abort(404);
		}

		return View::make('events.edit')->with('event', $event);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		if (!$user) {
			Log::info('Attempt to edit a non-user!');
			
			App::abort(404);
		}

		if ($user->id != Auth::id()) {
			Log::info('Attempt to edit account belonging to another user');

			App::abort(404);
		}

		return $this->validateAndSave($user);
	}

	public function validateAndSave($user)
	{
		try {

			$user->first_name 			 = Input::get('first_name');
			$user->last_name  			 = Input::get('last_name');
			$user->email 	  			 = Input::get('email');
			$user->password   			 = Input::get('password');
			$user->password_confirmation = Input::get('pasword_confirmation');

			$user->saveOrFail();

			return Redirect::action('HomeController@showHome');

		} catch (Watson\Validating\ValidationException $e) {

			Session::flash('errorMessage',
				'Ohh no! Something went wrong. You should be seeing some errors down below.');

	    	Log::info('Validation failed', Input::all());

			return Redirect::to('users.create')
            	->withErrors($user->getErrors())
            	->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		
		if (!$user) {
			Log::info('Attempt to delete a non-user from the database!');
			
			App::abort(404);
		}

		if ($user->id != Auth::id()) {
			Log::info('Attempt to by user' . $Auth::);

			App::abort(404);
		}

		$user->delete();

		return Redirect::action('UsersContoller@index');
	}

}
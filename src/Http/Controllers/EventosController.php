<?php

namespace Maiklez\Multimedia\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Debugbar;
use Maiklez\Multimedia\Models\Evento;

class EventosController extends Controller
{
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
	}
	
	/**
	 * all eventos
	 *
	 * @return View
	 */
	public function eventos(){
		$eventos = Evento::all();
	
		return view ( 'multimedia::eventos/eventos' , compact ( 'eventos'));
	}
	
	/**
	 * index the Eventoes
	 *
	 * @return View
	 */
	public function index(){
		$eventos = Evento::all();
	
		return view ( 'multimedia::eventos/index' , compact ( 'eventos'));
	}
	
	/**
	 * Create a new album
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function create(Request $request)
	{
	
		return view('multimedia::eventos/create', [
	
		]);
	}
	
	/**
	 * Create a new task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->authorize('blog',  Auth::user());
	
		$this->validate($request, Evento::storeRules());
		$id = \DB::transaction(function () use ($request){
			$evento = Evento::create(Evento::storeAttributes($request));

			return $evento->id;
		});
		
		return redirect(route('evento.edit', $id));
	}
	
	/**
	* show the given task.
	*
	* @param  Request  $request
	* @param  Task  $task
	* @return Response
	*/
	public function show(Request $request,  Evento $evento)
	{
		Debugbar::info($evento);
		return view('multimedia::eventos/show', [
				'evento' => $evento,
		]);
	}
	
	/**
	 * Edit the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function edit(Request $request, Evento $evento)
	{
		$this->authorize('blog',  Auth::user());
	
		return view('multimedia::eventos/edit', [
				'evento' => $evento,
				
		]);
	}
	
	/**
	 * Update the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function update(Request $request, Evento $evento)
	{
		$this->authorize('blog',  Auth::user());
	
		$this->validate($request, Evento::storeRules());
	
		\DB::transaction(function () use ($request, $evento){
			$evento->update(Evento::storeAttributes($request));
			
		});
	
	
		return redirect(route('evento.edit', $evento))->with('success', 'Profile updated!');
	}
	
	/**
	 * Destroy the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function destroy(Request $request, Evento $evento)
	{
		$this->authorize('admin',  Auth::user());
				
		$evento->delete();
	
		return redirect(route('evento'))->with('success', 'Evento Deleted!');
	}

	
	/**
	 * index the Eventos
	 *
	 * @return View
	 */
	public function getEventos(){
		$eventos = Evento::all();
	
		return view ( 'multimedia::eventos/index' , compact ( 'eventos'));
	}
}

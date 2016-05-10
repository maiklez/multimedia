<?php

namespace Maiklez\Multimedia\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Maiklez\Multimedia\Models\Album;
use Maiklez\Multimedia\Models\Resource;

use Debugbar;

class MultimediaController extends Controller
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
	 * index the Albumes
	 *
	 * @return View
	 */
	public function getAlbumes(){
		$albumes = Album::all();
	
		return view ( 'multimedia::albumes/index' , compact ( 'albumes'));
	}
	
	/**
	 * Create a new album
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function create(Request $request)
	{
	
		return view('multimedia::albumes/create', [
	
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
	
		$this->validate($request, Album::storeRules());
		$id = \DB::transaction(function () use ($request){
			$album = Album::create(Album::storeAttributes($request));
			
			$files = $request->file('files');
			//dd($files);
			
			if(!empty($files)){
				foreach ($files as $file){
				    if(!is_null($file)){				    	
				    
						$destinationPath = storage_path().'/uploads/'. urlencode($album->title) . '/';
							
						$filename = $file->getClientOriginalName();
							
						$file->move($destinationPath, $filename);
							
						$nameFile = '/uploads/'. urlencode($album->title) . '/';
						$nameFile .= $filename;
						Debugbar::info($nameFile);
							
						$res = new Resource([
								'title' => $filename,
								'link'=>$nameFile,
								'tipo'=> 'Imagen' //array_search ('Imagen', Resource::$TIPO)
						]);
							
						$res->album_id = $album->id;
						$album->resources()->save($res);
						//$res->save();
				    }
				}
			}
			
			return $album->id;
		});
		
		return redirect(route('album.edit', $id));
	}
	
	/**
	* show the given task.
	*
	* @param  Request  $request
	* @param  Task  $task
	* @return Response
	*/
	public function show(Request $request, Album $album)
	{
	
		return view('multimedia::albumes/show', [
				'album' => $album,
				'resources' => $album->resources,
		]);
	}
	
	/**
	 * Edit the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function edit(Request $request, Album $album)
	{
		$this->authorize('blog',  Auth::user());
	
		return view('multimedia::albumes/edit', [
				'album' => $album,
				
		]);
	}
	
	/**
	 * Update the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function update(Request $request, Album $album)
	{
		$this->authorize('blog',  Auth::user());
	
		$this->validate($request, Album::storeRules());
	
		\DB::transaction(function () use ($request, $album){
			$album->update(Album::storeAttributes($request));
			
			$files = $request->file('files');
			//dd($files);
			
			if(!empty($files)){
				foreach ($files as $file){
				    if(!is_null($file)){				    	
				    
						$destinationPath = storage_path().'/uploads/'. urlencode($album->title) . '/';
							
						$filename = $file->getClientOriginalName();
							
						$file->move($destinationPath, $filename);
							
						$nameFile = '/uploads/'. urlencode($album->title) . '/';
						$nameFile .= $filename;
						Debugbar::info($nameFile);
							
						$res = new Resource([
								'title' => $filename,
								'link'=>$nameFile,
								'tipo'=> 'Imagen' //array_search ('Imagen', Resource::$TIPO)
						]);
							
						$res->album_id = $album->id;
						$album->resources()->save($res);
						//$res->save();
				    }
				}
			}
			
		});
	
	
		return redirect(route('album.edit', $album))->with('success', 'Profile updated!');
	}
	
	/**
	 * Destroy the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function destroy(Request $request, Album $album)
	{
		$this->authorize('admin',  Auth::user());
		
		if($album->resources()->count() > 0) return redirect(route('albumes'))->with('error', 'Es necesario borrar los resources first');
		
		$album->delete();
	
		return redirect(route('albumes'))->with('success', 'Profile Deleted!');
	}
	
	
	public function getResources(){
	
		$res = Resource::all();
	
		return view ( 'multimedia::resources/resources' , compact ( 'res'));
	}
	
	
	/**
	 * add a resource
	 *
	 * @return Response
	 */
	public function postAddResources(Request $req, $album_id) {
	
		Debugbar::info($req);
		
		$album = Album::find($album_id);
		
		
		$files = $req->file('files');
		Debugbar::info($files);
	
		foreach ($files as $file){
				
			$destinationPath = storage_path().'/uploads/'. urlencode($album->title) . '/';
				
			$filename = $file->getClientOriginalName();
				
			$file->move($destinationPath, $filename);
				
			$nameFile = '/uploads/'. urlencode($album->title) . '/';
			$nameFile .= $filename;
			Debugbar::info($nameFile);
				
			$res = new Resource([
					'title' => $filename,
					'link'=>$nameFile,
					'tipo'=> 'Imagen' //array_search ('Imagen', Resource::$TIPO)
			]);

			$res->album_id = $album->id;
			$album->resources()->save($res);
			//$res->save();
		}
	
		return redirect(route('album.show', $album_id))
		->with('success', 'Resource added: '. $nameFile);
	}
	
	/**
	 * add a resource
	 *
	 * @return Response
	 */
	public function postDeleteResources(Request $req, $album_id, $resource_id) 
	{
		$this->authorize('admin',  Auth::user());
		$album = Album::find($album_id);
		$resource = Resource::find($resource_id);
		$nameFile = $resource->title;
		$resource->delete();
	
		return redirect(route('album.edit', $album_id))
		->with('success', 'Resource deleted: '. $nameFile);
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

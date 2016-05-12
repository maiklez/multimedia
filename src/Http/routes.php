<?php

Route::group(['middleware' => 'web'], function () {
	
	//Route::get('blog', 'MaikBlogController@index')->name('blog');
	
	Route::get('albumes', 'MultimediaController@getAlbumes')->name('albumes')->middleware(['auth']);
	
	Route::resource('album', 'MultimediaController', ['only' => [
			'create', 'show','store', 'edit', 'update', 'destroy'
	], 'middleware' =>['auth']]);
	
	Route::post('album/{id}/add_resource', 'MultimediaController@postAddResources')->name('album.add_resource_album')->middleware(['auth']);
	
	Route::get('album/{album_id}/{resource_id}/delete_resource', 'MultimediaController@postDeleteResources')->name('album.delete_resource_album')->middleware(['auth']);
	
	//Route::post('post/{id}/addComment', 'MaikBlogController@addComment')->name('add_comment')->middleware(['auth']);
	
	//get the images of the albums from storage
	Route::get('uploads/albumes/{albumname}/{filename}', function ($albumname, $filename)
	{
		$path = storage_path() .'/uploads/albumes/'.$albumname. '/' . $filename;
	
		if(!File::exists($path)) abort(404);
	
		$file = File::get($path);
		$type = File::mimeType($path);
	
		$response = Response::make($file, 200);
		$response->header("Content-Type", $type);
	
		return $response;
	});
	
	//get the images of the eventos from storage
	Route::get('uploads/eventos/{filename}', function ($albumname, $filename)
	{
		$path = storage_path() .'/uploads/eventos/' . $filename;
	
		if(!File::exists($path)) abort(404);
	
		$file = File::get($path);
		$type = File::mimeType($path);
	
		$response = Response::make($file, 200);
		$response->header("Content-Type", $type);
	
		return $response;
	});
	
	Route::get('eventos', 'EventosController@eventos')->name('eventos')->middleware(['auth']);
	Route::resource('evento', 'EventosController', ['only' => [
			'index', 'create', 'show','store', 'edit', 'update', 'destroy'
	], 'middleware' =>['auth']]);
});
	
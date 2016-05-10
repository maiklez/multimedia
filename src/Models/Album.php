<?php

namespace Maiklez\Multimedia\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Album extends Model {
	
	protected $table = 'albumes';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'texto_h', 'fecha'];
	
	
	
	/**
	 * resources() one-to-many relationship method
	 *
	 * @return QueryBuilder
	 */
	public function resources() {
		return $this->hasMany ( Resource::class );
	}
	
	public static function  storeRules(){
		return [
				'title' => 'required|max:255',
		];
	}
	
	public static function storeAttributes(Request $req){
		return [
				'title' => $req->input('title'),
				'fecha' => $req->input('fecha'),
				'texto_h' => $req->input('texto_h'),
		];
		
	}

}
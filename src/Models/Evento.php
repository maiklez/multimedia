<?php
namespace Maiklez\Multimedia\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Evento extends Model {
	
	protected $table = 'eventos';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'texto_h', 'fecha_inicio', 'fecha_fin', 'tipo'];
	
	public static $TIPO = [1 => 'Concierto', 2 => 'Charla'];
	
	public static function  storeRules(){
		return [
				'title' => 'required|max:255',
		];
	}
	
	public static function storeAttributes(Request $req){
		return [
				'title' => $req->input('title'),
				'fecha_inicio' => $req->input('fecha_inicio'),
				'fecha_fin' => $req->input('fecha_fin'),
				'texto_h' => $req->input('texto_h'),
		];
	
	}
}
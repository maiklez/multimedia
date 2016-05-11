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
	protected $fillable = ['title', 'texto_h', 'imagen','fecha_inicio', 'fecha_fin', 'tipo'];
	
	public static $TIPO = [1 => 'Concierto', 2 => 'Charla'];
	
	public static function  storeRules(){
		return [
				'title' => 'required|max:255',
				'fecha_inicio' => 'required',
		];
	}
	
	public static function storeAttributes(Request $req){
		$file = $req->file('files');
		$nameFile=null;
		
		if(!is_null($file)){
			$nameFile = '/uploads/albums/'. urlencode($album->title) . '/';
			
			$destinationPath = storage_path().$nameFile;
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);
				
			$nameFile .= $filename;
		}
		
		
		return [
				'title' => $req->input('title'),
				'fecha_inicio' => $req->input('fecha_inicio'),
				'hora_inicio' => $req->input('hora_inicio'),
				'fecha_fin' => $req->input('fecha_fin'),
				'hora_fin' => $req->input('hora_fin'),
				'texto_h' => $req->input('texto_h'),
				'imagen' => $nameFile,
		];
	
	}
}
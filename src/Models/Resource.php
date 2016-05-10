<?php
namespace Maiklez\Multimedia\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model {
	
	protected $table = 'resources';
		
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'link', 'tipo'];
	
	public static $TIPO = [1 => 'Imagen', 2=>'Video', 3=>'Texto'];
	
	/**
	 * album() many-to-many relationship method
	 *
	 * @return QueryBuilder
	 */
	public function album() {
		return $this->belongsTo( Album::class );
	}
}
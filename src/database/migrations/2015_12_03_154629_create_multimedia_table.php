<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

    		Schema::create ( 'albumes', function (Blueprint $table) {
    			$table->increments ( 'id' )->unsigned ();
    			$table->string ( 'title' );
    			$table->date ( 'fecha' );
    			$table->text('texto_h');
    			$table->timestamps ();
    		} );
	    		
    		Schema::create ( 'resources', function (Blueprint $table) {
	    		$table->increments ( 'id' )->unsigned ();
	    		
	    		$table->integer ( 'album_id' )->unsigned ()->nullable ();
	    		$table->foreign ( 'album_id' )->references ( 'id' )->on ( 'albumes' );
	    		
	    		$table->string ( 'title' );
	    		$table->string ( 'link' )->nullable ();
	    		$table->string('tipo')->nullable ();	//imagen, video
	    		$table->timestamps ();
	    	} );
    	
    		Schema::create ( 'eventos', function (Blueprint $table) {
    			$table->increments ( 'id' )->unsigned ();
    			
    			$table->string ( 'title' );
    			$table->text('texto_h');
    			$table->string('imagen')->nullable ();
    			$table->date ( 'fecha_inicio' );
    			$table->time ( 'hora_inicio' )->nullable ();
    			
    			$table->date ( 'fecha_fin' )->nullable ();
    			$table->time ( 'hora_fin' )->nullable ();
    			
    			$table->string('tipo')->nullable ();	//concierto, charla
    			$table->timestamps ();
    		} );
    		
    			
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    	Schema::drop ( 'resources' );
    	Schema::drop ( 'eventos' );
    	Schema::drop ( 'album' );
    }
}

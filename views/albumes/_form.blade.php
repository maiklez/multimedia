
<!-- Title -->
            <div class="form-group">
                <label for="album-title" class="col-sm-3 control-label">Album title</label>

                <div class="col-sm-6">                    
		    			{!! Form::text('title', old('title', isset($album) ? $album->title : null), 
		    													array('class'=>'form-control', 'id'=>'album-title',
		    													'placeholder'=>'Title',
		    													'style'=>'')) !!}
		    			{!! $errors->first('title', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            <!-- fecha -->
            <div class="form-group">
                <label for="album-fecha" class="col-sm-3 control-label">Fecha</label>

                <div class="col-sm-6">                    
		    			{!! Form::date('fecha', old('title', isset($album) ? $album->fecha : null), 
		    													array('class'=>'form-control', 'id'=>'album-fecha',
		    													'placeholder'=>'Fecha',
		    													'style'=>'')) !!}
		    			{!! $errors->first('fecha', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            <div class="form-group">
                <label for="album-publicar" class="col-sm-3 control-label">Publicar</label>

                <div class="col-sm-6">                    
		    			{{ Form::hidden('publicar', false) }}
						{{ Form::checkbox('publicar', old('publicar', isset($album) ? $album->publicar : false), null,
		    													array('class'=>'form-control', 'id'=>'album-publicar',
		    													'style'=>'')) }}

		    			{!! $errors->first('publicar', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            <div class="form-group">            
                <div class="col-sm-12">             
	                	<textarea name="texto_h" rows="50" cols="80" >{!! old('texto_h', isset($album) ? $album->texto_h : null) !!}</textarea>
		    			{!! $errors->first('texto_h', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
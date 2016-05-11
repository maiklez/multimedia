
		<!-- Title -->
            <div class="form-group">
                <label for="evento-title" class="col-sm-3 control-label">evento title</label>

                <div class="col-sm-6">                    
		    			{!! Form::text('title', old('title', isset($evento) ? $evento->title : null), 
		    													array('class'=>'form-control', 'id'=>'evento-title',
		    													'placeholder'=>'Title',
		    													'style'=>'')) !!}
		    			{!! $errors->first('title', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            
             <!-- fecha -->
            <div class="form-group">
                <label for="evento-fecha_inicio" class="col-sm-3 control-label">fecha_inicio</label>

                <div class="col-sm-6">                    
		    			
		    			
		    			{!! Form::date('fecha_inicio', old('fecha_inicio', isset($evento) ? $evento->fecha_inicio : null), 
		    													array('class'=>'form-control', 'id'=>'evento-fecha_inicio',
		    													'placeholder'=>'Fecha Inicio',
		    													'style'=>'')) !!}
		    			{!! $errors->first('fecha_inicio', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            <!-- hora -->
            <div class="form-group">
                <label for="evento-hora_inicio" class="col-sm-3 control-label">Hora Inicio</label>

                <div class="col-sm-6">                    
		    			
		    			
		    			{!! Form::time('hora_inicio', old('hora_inicio', isset($evento) ? $evento->hora_inicio : null), 
		    													array('class'=>'form-control', 'id'=>'evento-hora_inicio',
		    													'placeholder'=>'hora Inicio',
		    													'style'=>'')) !!}
		    			{!! $errors->first('hora_inicio', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            <!-- fecha fin-->
            <div class="form-group">
                <label for="evento-fecha_fin" class="col-sm-3 control-label">fecha_fin</label>

                <div class="col-sm-6">                    
		    			{!! Form::date('fecha_fin', old('fecha_fin', isset($evento) ? $evento->fecha_fin : null), 
		    													array('class'=>'form-control', 'id'=>'evento-fecha_fin',
		    													'placeholder'=>'Fecha fin',
		    													'style'=>'')) !!}
		    			{!! $errors->first('fecha_fin', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            
            
            <!-- hora fin-->
            <div class="form-group">
                <label for="evento-hora_fin" class="col-sm-3 control-label">hora_fin</label>

                <div class="col-sm-6">                    
		    			{!! Form::time('hora_fin', old('hora_fin', isset($evento) ? $evento->hora_fin : null), 
		    													array('class'=>'form-control', 'id'=>'evento-hora_fin',
		    													'placeholder'=>'Hora fin',
		    													'style'=>'')) !!}
		    			{!! $errors->first('hora_fin', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            <div class="form-group">
                @if(isset($evento) && !is_null($evento->imagen))
                	<div class="col-sm-12" style=" text-align: center;">
                		<img  alt="{!! $evento->title !!}" src="{!! asset($evento->imagen) !!}" style="  max-width: 300px;">
                	</div>
                @endif
                
                <label for="imagen" class="col-sm-3 control-label">Imagen del Evento</label>                
                
                <div class="col-sm-6" style="padding-top: 7px;">
            		<input type="file" id="imagen" name="imagen" />
           		</div>                
            </div>
            
		<div class="form-group">            
                <div class="col-sm-12">             
	                	<textarea name="texto_h" rows="50" cols="80" >{!! old('texto_h', isset($evento) ? $evento->texto_h : null) !!}</textarea>
		    			{!! $errors->first('texto_h', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>


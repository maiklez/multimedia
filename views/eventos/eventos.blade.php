@extends('layouts.app')

@section('title', '- Eventos')


@section('content')
<div class="container">
	
	 <div class="row">
	 	@foreach($eventos as $evento)
                     <div class="panel panel-default">       
	                     <div class="panel-heading">{{ $evento->title }} - empezamos el {{ $evento->fecha_inicio }}</div>
	                                
	                     <div>{{ $evento->fecha_inicio }}</div>
	                                
	                     <div>{!!  $evento->texto_h !!}</div>
                     </div>           
       @endforeach
	 </div>
	 
	 <div class="row">
			<div class="col s4 offset-s6">
				<div class="panel panel-post">
					<div class="panel-heading">Eventos</div>
					
					<div class="panel-body">
						
						
				
				@foreach($eventos as $evento)
                     <div class="panel panel-default col-sm-3">       
	                     <div class="panel-heading">{{ $evento->title }}</div>
	                                
	                     <div>{{ $evento->fecha_inicio }}</div>
	                     <div>{!!  $evento->texto_h !!}</div>
                     </div>           
                @endforeach
                        
                </div>
					
				</div>
			</div>
		</div>
    
	
</div>
@endsection

@extends('layouts.app')

@section('title', '- Eventos')


@section('content')
<div class="container">
	
	 <div class="row">
	 	@foreach($eventos as $evento)
                     <div class="panel panel-default">       
	                     <div class="panel-heading">{{ $evento->title }} - empezamos el {{ $evento->fecha_inicio }}</div>
	                                
	                     <div>{{ $evento->fecha_inicio }}</div>
	                     @if(!is_null($evento->imagen))
		                	<div class="col-sm-12" style=" text-align: center;">
		                		<img  alt="{!! $evento->title !!}" src="{!! asset($evento->imagen) !!}" style="  max-width: 300px;">
		                	</div>
		                @endif           
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
                     <div class="panel panel-default col-sm-4">       
	                     <div class="panel-heading">{{ $evento->title }}</div>
	                                
	                     <div>{{ $evento->fecha_inicio }}</div>
	                     <div>{!!  $evento->texto_h !!}
	                     @if(!is_null($evento->imagen))
		                	<div class="col-sm-12" style=" text-align: center;">
		                		<img  alt="{!! $evento->title !!}" src="{!! asset($evento->imagen) !!}" style="  max-width: 300px;">
		                	</div>
		                @endif
	                     </div>
                     </div>           
                @endforeach
                        
                </div>
					
				</div>
			</div>
		</div>
    
	
</div>
@endsection

@extends('layouts.app')


@section('title')
	@if($evento)
		{{ $evento->title }}
		
	@else
		Page does not exist
	@endif
@endsection


@section('content')


		
@include('partials.notifications')

@if($evento)
	
<div class="container">
    	<div class="row">
        <div class="panel panel-post">

        
            <div class="panel-body">
                 
					
					<div><h2>{{ $evento->title }}</h2></div>
					<div class="post-published">Published on {{ $evento->fecha_inicio }}</div>
					<div class="post-body">{!!  $evento->texto_h !!}</div>
					
    	

            </div>
            
        </div>
        </div>
        </div>
        	
</div>	
@else
404 error
@endif

@endsection
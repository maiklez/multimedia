@extends('layouts.app')


@section('title')
	@if($album)
		{{ $album->title }}
		
	@else
		Page does not exist
	@endif
@endsection


@section('content')


		
@include('partials.notifications')

@if($album)
	
	
	
	<div class="container">
    	
    	<div class="row" style="
    /*float: right;
    margin-right: 10px;
     padding: 10px; */
">
    		@include('multimedia::albumes/resources_form')
    </div>	
    	
    	<div class="row">
        <div class="panel panel-post">

        
            <div class="panel-body">
                 
					
					<div><h2>{{ $album->title }}</h2></div>
					<div class="post-published">Published on {{ $album->fecha }}</div>
					<div class="post-body">{!!  $album->texto_h !!}</div>
					<div >
					@foreach($resources as $resource)
						<div class="image-card" style="min-height: 300px; float:left;">
							<a class="btn btn-danger fa  fa-trash imagebuttom" href={!! route('album.delete_resource_album', [$album->id, $resource->id]) !!} 
							style="
    position: relative;
    top: -15px;
    float: right;
    left: -25px;
"
							></a>
							<img alt="" src="{!! url($resource->link) !!}" style="max-width:300px;">
							<div class=""><a href={!! url($resource->link) !!}>{!!  $resource->link !!}</a></div>
						</div>
	                    
					@endforeach    
    				</div>
    	

            </div>
            <a style="float: right;" class="btn btn-warning glyphicon glyphicon-edit" href={!! route('album.edit', $album->id) !!}>
	                                     <span>Edit</span></a>
        </div>
        </div>
        </div>
        	
	
@else
404 error
@endif

@endsection
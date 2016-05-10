@extends('layouts.app')

@section('title', 'Resources')

@section('content')
<div class="container">
	
	<div class="card-panel">
		<h2>Resources</h2>
		
		
		
		@foreach($res as $resource)
			<img alt="" src="{!!url( '/uploads/'.$resource->web_page.'/'.$resource->title) !!}" style="max-width:300px;">
		@endforeach    
    
    	@include('admin/resources/resources_form')
	</div>	
    
	
</div>
@endsection

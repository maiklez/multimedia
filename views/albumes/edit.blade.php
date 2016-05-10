@extends('layouts.app')


@section('scripts')
	
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({
  	  selector: 'textarea',
  	  height: 500,
  	  plugins: [
  	    'advlist autolink lists link image charmap print preview anchor',
  	    'searchreplace visualblocks code fullscreen',
  	    'insertdatetime media table contextmenu paste code '
  	  ],
  	  relative_urls: false,
  	  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  	  content_css: [
  	    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
  	    '//www.tinymce.com/css/codepen.min.css'
  	  ],
  	style_formats: [
  	              { title: 'Headers', items: [
  	                { title: 'h1', block: 'h1' },
  	                { title: 'h2', block: 'h2' },
  	                { title: 'h3', block: 'h3' },
  	                { title: 'h4', block: 'h4' },
  	                { title: 'h5', block: 'h5' },
  	                { title: 'h6', block: 'h6' }
  	              ] },

  	              { title: 'Blocks', items: [
  	                { title: 'p', block: 'p' },
  	                { title: 'div', block: 'div' },
  	                { title: 'terminal', block: 'p', classes: 'terminal' },
  	                { title: 'terminal2', inline: 'span', classes: 'terminal' },
  	                { title: 'Codigo', block: 'pre', classes: 'prettyprint linenums' },
  	                { title: 'pre', block: 'pre' }
  	              ] },

  	              { title: 'Containers', items: [
  	                { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
  	                { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
  	                { title: 'blockquote', block: 'blockquote', wrapper: true },
  	                { title: 'hgroup', block: 'hgroup', wrapper: true },
  	                { title: 'aside', block: 'aside', wrapper: true },
  	                { title: 'figure', block: 'figure', wrapper: true }
  	              ] }
  	            ]
  	});</script>
@endsection


@section('content')
<div class="container">
    
    <div class="row">    
		<div class="panel panel-post">
			<div class="panel-heading">Edit The Album</div>
	            
		    <div class="panel-body">
		        <!-- Display Validation Errors -->
		       	<div class="form-group">
		       		@include('partials.notifications')
		       	</div>
		       
		       {!! Form::open(array('route'=>['album.update', $album->id], 'enctype' => 'multipart/form-data', 'files'=>true, 'class'=>"form-horizontal")) !!}
		        	<input name="_method" type="hidden" value="PUT">
		        	{!! csrf_field() !!}
		        	
		        	
		        	@include('multimedia::albumes/_form')         

		        	@include('multimedia::albumes/resources_attributes')
		        	
		        	@foreach($album->resources as $resource)
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
		        	
		        	<!-- Add Task Button -->
		            <div class="form-group">
		                <div class="col-sm-offset-3 col-sm-6">
		                    <button type="submit" class="btn btn-default" name="publish" value="publish">
		                        <i class="fa fa-plus"></i> Update
		                    </button>

		                </div>
		            </div>
		        </form>
		    </div>
		</div>
	
	</div>
	</div>

@endsection
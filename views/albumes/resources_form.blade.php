


<div class="panel panel-post" style="padding-bottom:40px;">
<div class="panel-heading">Añadir Resources al Album</div>
<div class="panel-body">

{{-- Edit Data Model Form --}}
	{!! Form::open(array('route'=>['album.add_resource_album', $album->id], 'enctype' => 'multipart/form-data', 'files'=>true, 'class'=>"form-vertical")) !!}
	
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
		<!-- ./ csrf token -->

		
@include('multimedia::albumes/resources_attributes')

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit"  class="btn btn-default">Add To Album</button>
			</div>
		</div>
		<!-- ./ form actions -->
		
		
	</form>
	
	
</div></div>
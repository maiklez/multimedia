@extends('layouts.app')

@section('title', '- Albumes')

@section('content')
<div class="container">

@include('partials.notifications')
	    <div class="row">
			<div class="col s4 offset-s6">
				<div class="panel panel-post">
					<div class="panel-heading">Albumes</div>
					
					<div class="panel-body">
						<a class="btn btn-warning fa fa-plus" href={!! route('album.create') !!}><span> Create new Album</span></a>
						
							
							
					<table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Title</th>
                        <th>Fecha</th>
                        <th>Text</th>
                        <th>N Resources</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach($albumes as $album)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $album->title }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $album->fecha }}</div>
                                </td>
                                
								<td class="table-text">
                                    <div>{!!  substr($album->texto_h,0, strpos($album->texto_h, "</p>"))  !!}...<br>{{ $album->created_at }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $album->resources()->count() }}</div>
                                    
                                </td>
                                
                                <td>
                                     <div	>
	                                     
                                     
	                                     <a class="btn btn-default glyphicon glyphicon-eye-open" href={!! route('album.show', $album->id) !!}>
	                                     <span>Show</span></a>
	                                     
	                                     <a class="btn btn-warning glyphicon glyphicon-edit" href={!! route('album.edit', $album->id) !!}>
	                                     <span>Edit</span></a>
	
	                                     
	                                     @include('partials.delete_button', [$url=route('album.destroy', $album->id), $id = 'delete-album-'.$album->id])
                                     
                                     </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
					
				</div>
			</div>
		</div>
    

	
</div>
@endsection

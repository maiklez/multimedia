@extends('layouts.app')

@section('title', '- Eventos')


@section('content')
<div class="container">
	
	 <div class="row">
			<div class="col s4 offset-s6">
				<div class="panel panel-post">
					<div class="panel-heading">Eventos</div>
					
					<div class="panel-body">
						<a class="btn btn-warning fa fa-plus" href={!! route('evento.create') !!}><span> Create new evento</span></a>
						<a class="btn btn-info fa fa-plus" href={!! route('eventos') !!}><span> Show eventos</span></a>
						
							
							
					<table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Title</th>
                        <th>Fecha</th>
                        <th>Text</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach($eventos as $evento)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $evento->title }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $evento->fecha_inicio }}</div>
                                </td>
                                
								<td class="table-text">
                                    <div>{!!  substr($evento->texto_h,0, strpos($evento->texto_h, "</p>"))  !!}...<br>{{ $evento->created_at }}</div>
                                </td>
                                
                                
                                
                                <td>
                                     <div	>
	                                     
                                     
	                                     <a class="btn btn-default glyphicon glyphicon-eye-open" href={!! route('evento.show', $evento->id) !!}>
	                                     <span>Show</span></a>
	                                     
	                                     <a class="btn btn-warning glyphicon glyphicon-edit" href={!! route('evento.edit', $evento->id) !!}>
	                                     <span>Edit</span></a>
	
	                                     
	                                     @include('partials.delete_button', [$url=route('evento.destroy', $evento->id), $id = 'delete-album-'.$evento->id])
                                     
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

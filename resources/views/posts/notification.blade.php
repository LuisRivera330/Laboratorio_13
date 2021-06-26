@extends('layouts.app')

@section('content')

	<table class="table">
		<thead>
			<tr>
				<th scope="col">Fecha</th>
				<th scope="col">Contenido</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($notificaciones as $notificacion)
				<tr>
					<th scope="col">{{$notificacion -> created_at}}</th>
					<th scope="col">{{$notificacion -> data['content']}}</th>
				</tr>
			    
			@endforeach

			@php
			$notificaciones->markAsRead();
			@endphp
		</tbody>
	</table>
@endsection

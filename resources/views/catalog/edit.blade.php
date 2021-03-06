@extends('layouts.master')
@section('content')
	<div class="row" style="margin-top:20px">
		
		<div class="col-md-offset-3 col-md-6">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title text-center">
						<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
							Actualizar película
					</h3>
				</div>
				
				<div class="panel-body" style="padding:30px">
					
					{{-- TODO: Abrir el formulario e indicar el método POST --}}
					<form method="POST" action="{{ url('/catalog/update/') }}">
	    			{{ csrf_field() }}
						{{-- TODO: Protección contra CSRF --}}
						<input type="hidden" name="id" value="{{$movie->id}}">
						<div class="form-group">
							<label for="title">Título</label>
							<input type="text" name="title"  value="{{$movie->title}}" id="title" class="form-control">
						</div>
						
						<div class="form-group">
							<label for="year">Año</label>
							<input type="text" name="year" id="year"  value="{{$movie->year}}" class="form-control">
						</div>
						
						<div class="form-group">
							<label for="director">Director</label>
							<input type="text" name="director" id="director" value="{{$movie->director}}" class="form-control">
						</div>
						
						<div class="form-group">
							<label for="poster">Poster</label>
							<input type="text" name="poster" id="poster" value="{{$movie->poster}}" class="form-control">
						</div>
						
						<div class="form-group">
							<label for="synopsis">Resumen</label>
							<textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$movie->synopsis}}</textarea>
						</div>
						
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
								Actualizar película
							</button>
						</div>
					</form>
					{{-- TODO: Cerrar formulario --}}
					
				</div>
			</div>
		</div>
	</div>
@stop

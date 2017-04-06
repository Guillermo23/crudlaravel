@extends('layouts.master')
@section('menu')
@section('content')
  <div class="row">
    <div class="col-sm-4">
        <img src="{{$Pelicula['poster']}}" style="height:400px; width: 300px"/>
    </div>
    <div class="col-sm-8">
    <h3>{{$Pelicula['title']}}</h3>
    <p>Año :   {{$Pelicula['year']}}</p>
    <p>Director :   {{$Pelicula['director']}}</p><br>
    <p><strong>Resumen :</strong>   {{$Pelicula['synopsis']}}</p><br><br>
    @if ($Pelicula['rented'] == 1)
      @php ($i = "putReturn")
      <p><strong>Estado :</strong> Película actualmente alquilada.</p><br>
    @else
      @php ($i = "putRent")
      <p><strong>Estado :</strong> Película disponible para renta.</p><br>
    @endif
    <form action="{{action('CatalogController@'.$i, $Pelicula['id'])}}" method="POST" style="display:inline">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      @if ($Pelicula['rented'] == 1)
        <button type="submit" class="btn btn-danger" style="display:inline"> <i class=" glyphicon glyphicon-indent-right"></i>  
        Devolver película
        </button>
      @else
        <button type="submit" class="btn btn-success" style="display:inline"> <i class=" glyphicon glyphicon-indent-right"></i>  
        Alquilar película
        </button>
      @endif    
    </form>
    <form action="{{action('CatalogController@deleteMovie', $Pelicula['id'])}}" method="POST" style="display:inline">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger" name="button"><i class=" glyphicon glyphicon-trash"></i> Eliminar pelicula</button>
    </form>
    <a  class="btn btn-warning" name="button" href="{{ url('/catalog/edit/' . $Pelicula['id']) }}"><i class="glyphicon glyphicon-pencil"></i> Editar pelicula</a>
    <a  class="btn btn-default " name="button"  href="{{ url('/catalog') }}"> <i class="glyphicon glyphicon-chevron-left"></i> Volver al listado</a>
    </div>
  </div>
@endsection

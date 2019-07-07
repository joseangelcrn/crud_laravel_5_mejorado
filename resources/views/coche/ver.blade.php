@extends('layouts.app')

@section('content')
{{-- 
@if (session('mensaje'))
    <div class="alert alert-danger">
        <p>{{session('mensaje')}}</p>
    </div>
@endif --}}

@if (session('mensaje'))
    <div class="alert alert-info">
        <p>{{session('mensaje')}}</p>
    </div>
@endif

<div class="container">
    <div class="row">
        @if ($coche->imagen == null)
        <div class="col-sm-12 text-left">
            <img  class="img-thumbnail w-25 h-75" src="{{url('/imagenes/imagen_por_defecto_coche.png')}}" alt="Card image cap">
        </div>
        @else
        <div class="col-sm-12 text-left">
            <img  class="img-thumbnail w-25 h-100" src="{{url('/imagenes/'.$coche->imagen)}}" alt="Card image cap">
        </div>    
        @endif
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
                <div class="list-group">
                        <p class="list-group-item list-group-item-action active">
                          <b>Marca: </b>{{$coche->marca}}
                        </p>
                        <p class="list-group-item list-group-item-action"><b>Modelo: </b>{{$coche->modelo}}</p>
                        <p class="list-group-item list-group-item-action"><b>Matricula: </b>{{$coche->matricula}}</p>
                        <p class="list-group-item list-group-item-action"><b>Precio: </b>{{$coche->modelo}}€</p>
                </div>
        </div>
    </div>
    <p class="border-bottom mt-5 ">Acciones de <b>vehiculos</b></p>
    <div class="row">
        <a href="{{route('coche.edit',$coche->id)}}" class="btn btn-warning ml-3">Editar</a>
        <form action="{{route('coche.destroy',$coche->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="form-row ml-3">
                <button class="btn btn-danger" type="submit">Eliminar</button>    
            </div>
        </form> 
    
    </div>
</div>

@endsection

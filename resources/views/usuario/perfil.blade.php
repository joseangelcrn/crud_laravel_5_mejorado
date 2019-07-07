@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Mi perfil</h1>
        <div class="border p-2 text-center">
        <p class=""><b>Nombre: </b> {{$usuario->name}}</p>
        <p class=""><b>Email: </b> {{$usuario->email}}</p>
        </div>
        <p class="border-bottom mt-5">Acciones de <b>perfil</b></p>
        <div class="row">
           
        <a class="btn btn-warning ml-3" href="{{route('usuario.edit',$usuario->id)}}">Editar</a>
            <form action="/usuario/{{$usuario->id}}" method="POST" >    
                @method('DELETE')
                @csrf
               <div class="form-row ml-3">
                    <button class="btn btn-danger">Borrar</button>
               </div>
            </form>
        </div>
        <p class="border-bottom mt-5">Acciones de <b>vehiculos</b></p>

        <div class="row">
            <a class="btn btn-success ml-3" href="{{route('coche.create')}}">Añadir</a>
            <a class="btn btn-primary ml-3" href="{{route('coche.index')}}">Ver todos</a>
        </div>
    </div>
    
@endsection

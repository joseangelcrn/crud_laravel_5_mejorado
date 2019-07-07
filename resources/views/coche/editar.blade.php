@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Añadir un coche</h1>
        @if (session('mensaje'))
        <div class="alert alert-success">
            <p>{{session('mensaje')}}</p>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('coche.update',$coche->id)}}" autocomplete="off" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            
            <div class="form-group">
                <label>Matricula <b>*</b></label>
                <input type="text" class="form-control" name="matricula" value="{{$coche->matricula}}">
            </div>
                        
            <div class="form-group">
                <label>Marca</label>
                <input type="text" class="form-control" name="marca"  value="{{$coche->marca}}">
            </div>
                        
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" name="modelo"  value="{{$coche->modelo}}" >
            </div>
                        
            <div class="form-group">
                <label>Precio (€)</label>
                <input type="number" class="form-control" name="precio"  value="{{$coche->precio}}" >
            </div>

            @if ($coche->imagen != null)
                <div class="my-3">
                    <p><i>Imagen actual:</i></p>
                    <img class="img-thumbnail w-25 h-25 " src="{{url('/imagenes/'.$coche->imagen)}}" alt="imagen_coche">            
                </div>

            @else
                <div class="alert alert-info my-3 w-25">
                    <p><i>Sin foto actualmente</i></p>
                </div> 
            @endif

            <div class="form-group">
                <label>Imagen</label>
                <input type="file" class="form-control" name="imagen"  >
            </div>
        
            <button class="btn btn-warning" type="submit">Actualizar</button>
        </form>
    </div>


@endsection

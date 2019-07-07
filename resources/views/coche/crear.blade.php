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
    <form action="{{route('coche.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            
            <div class="form-group">
                <label>Matricula <b>*</b></label>
                <input type="text" class="form-control" name="matricula">
            </div>
                        
            <div class="form-group">
                <label>Marca</label>
                <input type="text" class="form-control" name="marca">
            </div>
                        
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" name="modelo"  >
            </div>
                        
            <div class="form-group">
                <label>Precio (€)</label>
                <input type="number" class="form-control" name="precio"  >
            </div>
                                    
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" class="form-control" name="imagen"  >
            </div>
            
            <button class="btn btn-primary" type="submit">Añadir Coche</button>
        </form>
    </div>


@endsection

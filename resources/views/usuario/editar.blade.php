@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <h1>Editar usuario</h1>
    <form action="{{route('usuario.update',$usuario->id)}}" autocomplete="off" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" disabled value="{{$usuario->id}}">
            </div>
            
            <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{$usuario->name}}">
                </div>
                        
            <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$usuario->email}}">
            </div>
                        
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" autocomplete="new-password" >
            </div>

            <button class="btn btn-primary" type="submit">Actualizar</button>
        </form>
    </div>

@endsection

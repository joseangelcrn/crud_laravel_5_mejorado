@extends('layouts.app')

@section('content')

@if (session('mensaje'))
    <div class="alert alert-danger">
        <p>{{session('mensaje')}}</p>
    </div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Coches de {{auth()->user()->name}}</h1>
        </div>
    </div>

    <div class="row mt-4">
        @foreach ($coches as $item)
        <div class="col-sm mt-3" >
                <div class="card" style="width: 18rem;">
                    @if ($item->imagen != null)
                        <img  class="card-img-top w-100" src="{{url('/imagenes/'.$item->imagen)}}" alt="Card image cap" style="height:300px;">
                    @else
                        <img  class="card-img-top w-100" src="{{url('/imagenes/imagen_por_defecto_coche.png')}}" alt="Card image cap" style="height:300px;">                        
                    @endif
                        
                    <div class="card-body">
                    <h5 class="card-title text-center">{{$item->marca}},{{$item->modelo}}</h5>
                        
                        <a  class="btn btn-primary w-100" href="{{route('coche.show',$item->id)}}" >Ver mas</a>
                        <form action="{{route('coche.destroy',$item->id )}}" method="POST" class="m-0 p-0">
                            @method('DELETE')
                            @csrf
                            <div class="form-group mt-2">
                                <button class="btn btn-danger w-100"  type="submit" >Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>



</div>

@endsection

@extends('layouts.app')

@section('template_title')
    Inico
@endsection
<style>
    .scrollable-list {
      max-height: 75vh;
      overflow-y: auto;
    }
  </style>
@section('content')
    <section class="content container-fluid">
        <div class="card">
            <div class="card-body ">
                <h5 class="card-title">{{$nombre}}</h5>
                <div class="row text-center scrollable-list" >
                @foreach ($producto as $item)
                    <div class="col-4 h-200 border rounded" >
                        <a href="{{ route('secciones.listaProductos',$item->id) }}">
                            <img src="{{ $item->imagen }}" class="img-fluid" alt=" imagen 1">
                        </a>
                        <p class="card-text">{{$item->nombre}}</p>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

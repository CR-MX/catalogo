@extends('layouts.app')

@section('template_title')
    Inico
@endsection
<style>
    .scrollable-list {
        max-height: 75vh;
        overflow-y: auto;
    }

    .card-img-top {
        height: 100%;
        object-fit: contain;
    }
</style>
@section('content')
    <section class="content container-fluid">
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" style="height: 200px;" src="{{ $producto->imagen }}" alt="Imagen de ejemplo">
                <span class="text-center">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p>{{ $producto->descripcion }}</p>
                </span>

                @if ($esUno)
                    <hr>
                    @if ($catfirst = $categorias->first())
                        <h5 class="card-title">{{$catfirst->categoria->nombre}}</h5>
                        <div class="row text-center scrollable-list" >
                            @foreach ($catfirst->categoria->diseno as $item)
                                <div class="col-4 h-200 border rounded" >
                                    <a href="{{ $item->imagen }}">
                                        <img src="{{ $item->imagen_ligera }}" class="img-fluid" alt=" imagen 1">
                                    </a>
                                    <p class="card-text">Clave: {{$catfirst->clave.'-'.$item->clave}}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @else
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary">
                            Categorias
                        </li>
                        @foreach ($categorias as $item)
                            <li class="list-group-item">
                                <a href="{{ route('secciones.listaDisenos', ['clave' => $producto->clave, 'categoria_id' => $item->categoria_id]) }}">
                                    {{ $item->categoria->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection

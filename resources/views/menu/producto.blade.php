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

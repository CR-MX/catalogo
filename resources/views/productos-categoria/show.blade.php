@if (Auth::check())    
@extends('layouts.app')

@section('template_title')
    {{ $productosCategoria->name ?? "{{ __('Show') Productos Categoria" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Productos Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos-categorias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $productosCategoria->producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $productosCategoria->categoria_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif

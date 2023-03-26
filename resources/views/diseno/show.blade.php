@extends('layouts.app')

@section('template_title')
    {{ $diseno->name ?? "{{ __('Show') Diseno" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Diseno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('disenos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $diseno->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $diseno->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen Ligera:</strong>
                            {{ $diseno->imagen_ligera }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $diseno->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

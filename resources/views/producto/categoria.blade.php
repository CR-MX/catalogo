@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.update', $producto->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('seccion_id', 'Sección') }}
                                        {{ Form::select('seccion_id', [request()->id => request()->nombre], null, ['class' => 'form-control' . ($errors->has('seccion_id') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('seccion_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('clave') }}
                                        {{ Form::text('clave', $producto->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
                                        {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('nombre') }}
                                        {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('imagen') }}
                                        {{ Form::text('imagen', $producto->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
                                        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

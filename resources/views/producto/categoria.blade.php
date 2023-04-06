@if (Auth::check())    
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
                        <span class="card-title">{{ __('Update') }} Producto {{$producto->id}}</span>
                    </div>
                    <div class="card-body">
                        
                            {!! Form::model ($producto, ['route' => ['producto.updatecatpro',$producto->id], 'method'=>'PUT']) !!}
                            @csrf
                            <input class="d-none" type="text" name="id" value="{{$producto->id}}" >
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="container">
                                        <div class="row">
                                            <li class="list-group-item list-group-item-primary">
                                                {{ Form::label('Selecciona el Rol') }}
                                            </li>
                                            <ul class="list-group">
                                                @foreach ($categorias as $cat)
                                                    <li class="list-group-item">
                                                        {!! Form::checkbox('cat[]',$cat->id,null,['class' => 'mr-1',$cat->es_check  ? 'checked="checked"' :'' ]) !!}
                                                        {{$cat->nombre}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <br>
                                        <div class="row d-flex justify-content-center">
                                            <a href="{{ route('productos.index',['id' => $producto->seccion_id, 'nombre' =>$producto->seccion->nombre ]) }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                                            <div class="col col-sm-2"></div>
                                            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif

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

                                        {{-- <div class="row">
                                            {{ Form::checkbox('admin') }} 
                                            //will produces the following HTML
                                            <input name="admin" type="checkbox" value="1">

                                            {{ Form::checkbox('admin', 'yes', true) }}
                                            //will produces the following HTML
                                            <input checked="checked" name="admin" type="checkbox" value="yes">
                                        </div> --}}
                                        <div class="row">
                                            <li class="list-group-item list-group-item-primary">
                                                {{ Form::label('Selecciona el Rol') }}
                                            </li>
                                            <ul class="list-group">
                                                @foreach ($categorias as $cat)
                                                    <li class="list-group-item">
                                                        {{-- {{$cat->es_check  ? 'checked="checked"' :''   }} --}}
                                                        {!! Form::checkbox('cat[]',$cat->id,null,['class' => 'mr-1',$cat->es_check  ? 'checked="checked"' :'' ]) !!}
                                                        {{$cat->nombre}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

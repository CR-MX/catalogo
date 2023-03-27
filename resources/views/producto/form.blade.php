<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="form-group">
                {{ Form::label('seccion_id','Sección') }}
                <?php $select = $seccion ?? [request()->id => request()->nombre]; ?>
                {{ Form::select('seccion_id',$select,null,['class' => 'form-control' . ($errors->has('seccion_id') ? ' is-invalid' : '')]) }}
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
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('productos.index',['id'=>key($select), 'nombre'=>$select[key($select)]]) }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>

    </div>
</div>
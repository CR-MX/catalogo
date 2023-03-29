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
                {{ Form::label('descripción') }}
                {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-sm p-1 form-group">
                @if ($producto->imagen)
                    <label for="imagen">
                        Imagen (<a href="{{ $producto->imagen }}" target="_blank">Ver Imagen anterior</a>, si subes una imgen se va a sobrescribir)
                    </label>
                @else
                    <label for="imagen">Imagen</label>
                @endif
                <input type="file" name="imagen" size="50" class="form-control">
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
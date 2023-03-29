<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $seccione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    @if ($seccione->imagen)
                        <label for="imagen">
                            Imagen (<a href="{{ $seccione->imagen }}" target="_blank">Ver Imagen anterior</a>, si subes una imgen se va a sobrescribir)
                        </label>
                    @else
                        <label for="imagen">Imagen</label>
                    @endif
                    <input type="file" name="imagen" size="50" class="form-control">
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('secciones.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>

    </div>
</div>
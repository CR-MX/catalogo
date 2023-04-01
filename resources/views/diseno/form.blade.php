<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    {{ Form::label('categoría') }}
                    <?php $select = $categoria ?? [request()->id => request()->nombre]; ?>
                    {{ Form::select('categoria_id', $select,null, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    @if ($diseno->imagen_ligera)
                        <label for="imagen_ligera">
                            Imagen Ligera (<a href="{{ $diseno->imagen_ligera }}" target="_blank">Ver Imagen anterior</a>, si subes una imgen se va a sobrescribir)
                        </label>
                    @else
                        <label for="imagen_ligera">Imagen Ligera</label>
                    @endif
                    <input type="file" name="imagen_ligera" size="50" class="form-control">
                </div>
                <div class="form-group">
                    @if ($diseno->imagen)
                        <label for="imagen">
                            Imagen (<a href="{{ $diseno->imagen }}" target="_blank">Ver Imagen anterior</a>, si subes una imgen se va a sobrescribir)
                        </label>
                    @else
                        <label for="imagen">Imagen</label>
                    @endif
                    <input type="file" name="imagen" size="50" class="form-control">
                </div>
            </div>
			<br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('disenos.index',['id'=>key($select), 'nombre'=>$select[key($select)]]) }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
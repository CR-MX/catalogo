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
                <br>
                <div class="form-group">
                    <label> Subir Imagenes </label>
                    <br>
                    <input multiple type="file" name="imagen" size="50" class="form-control">
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
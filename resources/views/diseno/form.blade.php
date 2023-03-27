<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            <?php $select = $categoria ?? [request()->id => request()->nombre]; ?>
            {{ Form::select('categoria_id', $select,null, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $diseno->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen_ligera') }}
            {{ Form::text('imagen_ligera', $diseno->imagen_ligera, ['class' => 'form-control' . ($errors->has('imagen_ligera') ? ' is-invalid' : ''), 'placeholder' => 'Imagen Ligera']) }}
            {!! $errors->first('imagen_ligera', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::text('imagen', $diseno->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
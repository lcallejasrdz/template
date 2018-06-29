<div class="tab-pane" id="tab1">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}">
        {!! Form::label('category_id', trans('validation.attributes.category_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('category_id', $catalog_category_id, null, ['id' => 'category_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.category_id')]) !!}
            <span class="help-block">{{ $errors->first('category_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        {!! Form::label('name', trans('validation.attributes.name').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.name')]) !!}
            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
        </div>
    </div>
</div>
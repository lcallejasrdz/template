<div class="tab-pane" id="tab1">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('country_id') ? 'has-error' : '' }}">
        {!! Form::label('country_id', trans('validation.attributes.country_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('country_id', $catalog_country_id, null, ['id' => 'country_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.country_id')]) !!}
            <span class="help-block">{{ $errors->first('country_id', ':message') }}</span>
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
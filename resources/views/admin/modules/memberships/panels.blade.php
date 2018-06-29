<div class="tab-pane" id="tab1">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        {!! Form::label('name', trans('validation.attributes.name').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.name')]) !!}
            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
        </div>
    </div>
    
    <div class="form-group {{ $errors->first('quantity') ? 'has-error' : '' }}">
        {!! Form::label('quantity', trans('validation.attributes.quantity').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('quantity', old('quantity'), ['id' => 'quantity', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.quantity')]) !!}
            <span class="help-block">{{ $errors->first('quantity', ':message') }}</span>
        </div>
    </div>
    
    <div class="form-group {{ $errors->first('monthly_cost') ? 'has-error' : '' }}">
        {!! Form::label('monthly_cost', trans('validation.attributes.monthly_cost').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('monthly_cost', old('monthly_cost'), ['id' => 'monthly_cost', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.monthly_cost')]) !!}
            <span class="help-block">{{ $errors->first('monthly_cost', ':message') }}</span>
        </div>
    </div>
    
    <div class="form-group {{ $errors->first('annual_cost') ? 'has-error' : '' }}">
        {!! Form::label('annual_cost', trans('validation.attributes.annual_cost').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('annual_cost', old('annual_cost'), ['id' => 'annual_cost', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.annual_cost')]) !!}
            <span class="help-block">{{ $errors->first('annual_cost', ':message') }}</span>
        </div>
    </div>
</div>
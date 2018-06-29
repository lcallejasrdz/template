@extends('layout.principal')

@section('title', '| '.trans($active.'.title'))

@section('styles')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
            <h1>{{ trans($active.'.title') }}</h1>
		</div>
	</div>
    <div class="row">
		<div class="col-sm-12">
			{!! Form::open(['route' => 'payment-paypal', 'method' => 'post', 'id' => 'formValidation', 'class' => 'form-horizontal', 'files' => true]) !!}
				<div id="rootwizard">
					<ul>
				        <li>
						    {!! link_to('#tab1', trans($active.'.title'), ['data-toggle' => 'tab']) !!}
						</li>
				    </ul>
				    <br>
				    <div class="tab-content">
				        <div class="tab-pane" id="tab1">
						    <h2 class="hidden">&nbsp;</h2>
						    <div class="form-group {{ $errors->first('country_id') ? 'has-error' : '' }}">
						        {!! Form::label('country_id', trans('validation.attributes.country_id').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::select('country_id', $catalog_country_id, null, ['id' => 'country_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.country_id')]) !!}
						            <span class="help-block">{{ $errors->first('country_id', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('state_id') ? 'has-error' : '' }}">
						        {!! Form::label('state_id', trans('validation.attributes.state_id').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::select('state_id', $catalog_state_id, null, ['id' => 'state_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.state_id')]) !!}
						            <span class="help-block">{{ $errors->first('state_id', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('city_id') ? 'has-error' : '' }}">
						        {!! Form::label('city_id', trans('validation.attributes.city_id').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::select('city_id', $catalog_city_id, null, ['id' => 'city_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.city_id')]) !!}
						            <span class="help-block">{{ $errors->first('city_id', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('municipality') ? 'has-error' : '' }}">
						        {!! Form::label('municipality', trans('validation.attributes.municipality').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('municipality', old('municipality'), ['id' => 'municipality', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.municipality')]) !!}
						            <span class="help-block">{{ $errors->first('municipality', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('colony') ? 'has-error' : '' }}">
						        {!! Form::label('colony', trans('validation.attributes.colony').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('colony', old('colony'), ['id' => 'colony', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.colony')]) !!}
						            <span class="help-block">{{ $errors->first('colony', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('street') ? 'has-error' : '' }}">
						        {!! Form::label('street', trans('validation.attributes.street').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('street', old('street'), ['id' => 'street', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.street')]) !!}
						            <span class="help-block">{{ $errors->first('street', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('no_ext') ? 'has-error' : '' }}">
						        {!! Form::label('no_ext', trans('validation.attributes.no_ext').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('no_ext', old('no_ext'), ['id' => 'no_ext', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.no_ext')]) !!}
						            <span class="help-block">{{ $errors->first('no_ext', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('no_int') ? 'has-error' : '' }}">
						        {!! Form::label('no_int', trans('validation.attributes.no_int'), ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('no_int', old('no_int'), ['id' => 'no_int', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.no_int')]) !!}
						            <span class="help-block">{{ $errors->first('no_int', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('postal_code') ? 'has-error' : '' }}">
						        {!! Form::label('postal_code', trans('validation.attributes.postal_code').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('postal_code', old('postal_code'), ['id' => 'postal_code', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.postal_code')]) !!}
						            <span class="help-block">{{ $errors->first('postal_code', ':message') }}</span>
						        </div>
						    </div>
						</div>

				        <ul class="pager wizard">
				            <li class="previous">
				                {!! link_to('#', trans('strings.wizard.previous')) !!}
				            </li>
				            <li class="next">
				                {!! link_to('#', trans('strings.wizard.next')) !!}
				            </li>
				            <li class="next finish" style="display:none;">
				                {!! link_to('#', trans('strings.wizard.finish')) !!}
				            </li>
				        </ul>
				    </div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	@include('purchases.formvalidation.'.$active)
	{{ Html::script('assets/plugins/bootstrap-wizard/wizard.call.js') }}

    {{-- Dynamic Select --}}
    {{ Html::script("js/dynamic_select_init.js") }}
    {{ Html::script("js/dynamic_select.js") }}
    {{-- Dynamic Checkbox --}}
    {{ Html::script("js/dynamic_checkbox_init.js") }}
    {{ Html::script("js/dynamic_checkbox.js") }}
@endsection
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
			{!! Form::model($item, ['route' => [$active.'.update', $item], 'method' => 'put', 'id' => 'formValidation', 'class' => 'form-horizontal', 'files' => true]) !!}
				<div id="rootwizard">
					<ul>
				        <li>
						    {!! link_to('#tab1', trans($active.'.tabs.general'), ['data-toggle' => 'tab']) !!}
						</li>
				    </ul>
				    <br>
				    <div class="tab-content">
				        <div class="tab-pane" id="tab1">
						    <h2 class="hidden">&nbsp;</h2>
						    <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }}">
						        {!! Form::label('first_name', trans('validation.attributes.first_name').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('first_name', old('first_name'), ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.first_name')]) !!}
						            <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }}">
						        {!! Form::label('last_name', trans('validation.attributes.last_name').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('last_name', old('last_name'), ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.last_name')]) !!}
						            <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('gender_id') ? 'has-error' : '' }}">
						        {!! Form::label('gender_id', trans('validation.attributes.gender_id').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::select('gender_id', $catalog_gender_id, null, ['id' => 'gender_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.gender_id')]) !!}
						            <span class="help-block">{{ $errors->first('gender_id', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('birthdate') ? 'has-error' : '' }}">
						        {!! Form::label('birthdate', trans('validation.attributes.birthdate').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('birthdate', old('birthdate'), ['id' => 'birthdate', 'class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.birthdate'), 'readonly']) !!}
						            <span class="help-block">{{ $errors->first('birthdate', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
						        {!! Form::label('phone', trans('validation.attributes.phone').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('phone', old('phone'), ['id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.phone')]) !!}
						            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('cellphone') ? 'has-error' : '' }}">
						        {!! Form::label('cellphone', trans('validation.attributes.cellphone').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('cellphone', old('cellphone'), ['id' => 'cellphone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.cellphone')]) !!}
						            <span class="help-block">{{ $errors->first('cellphone', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
						        {!! Form::label('email', trans('validation.attributes.email').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::text('email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
						            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
						        {!! Form::label('password', trans('validation.attributes.password').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password')]) !!}
						            @isset($item)
						                <p class="help-block">{{ trans('strings.help.password') }}</p>
						            @endisset
						            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
						        </div>
						    </div>

						    <div class="form-group {{ $errors->first('password_confirm') ? 'has-error' : '' }}">
						        {!! Form::label('password_confirm', trans('validation.attributes.password_confirm').' *', ['class' => 'col-sm-2 control-label']) !!}
						        <div class="col-sm-10">
						            {!! Form::password('password_confirm', ['id' => 'password_confirm', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password_confirm')]) !!}
						            @isset($item)
						                <p class="help-block">{{ trans('strings.help.password') }}</p>
						            @endisset
						            <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
						        </div>
						    </div>

						    @if(Sentinel::guest() || Sentinel::getUser()->role_id == 5)
						        {!! Form::hidden('status_id', 1) !!}
						    @else
						        <div class="form-group {{ $errors->first('status_id') ? 'has-error' : '' }}">
						            {!! Form::label('status_id', trans('validation.attributes.status_id').' *', ['class' => 'col-sm-2 control-label']) !!}
						            <div class="col-sm-10">
						                {!! Form::select('status_id', $catalog_status_id, null, ['id' => 'status_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.status_id')]) !!}
						                <span class="help-block">{{ $errors->first('status_id', ':message') }}</span>
						            </div>
						        </div>
						    @endif

						    {!! Form::hidden('role_id', 5) !!}
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
	@include('admin.modules.customers.formvalidation.edit')
	{{ Html::script('assets/plugins/bootstrap-wizard/wizard.call.js') }}

    {{-- Dynamic Select --}}
    {{ Html::script("js/dynamic_select.js") }}
    {{-- Dynamic Checkbox --}}
    {{ Html::script("js/dynamic_checkbox.js") }}
@endsection
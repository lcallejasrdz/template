@extends('layout.principal')

@section('title', '| '.trans('auth.title.password_recovery'))

@section('styles')
@endsection

@section('content')
	{!! Form::open(['route' => 'forgot-password', 'method' => 'post', 'id' => 'formValidation', 'class' => 'form-horizontal']) !!}
		<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
  			<div class="col-sm-12">
  				{!! Form::text('email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
	            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
  			</div>
  		</div>
  		<div class="form-group">
  			<div class="col-sm-12 text-right">
  				{!! Form::submit(trans('auth.title.password_recovery'), ['class' => 'btn btn-default']) !!}
  			</div>
  		</div>
	{!! Form::close() !!}
@endsection

@section('scripts')
	@include('auth.formvalidation.login')
@endsection
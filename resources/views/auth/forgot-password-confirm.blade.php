@extends('layout.principal')

@section('title', '| '.trans('auth.title.password_recovery'))

@section('styles')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                {!! Form::open(['method' => 'post', 'id' => 'formValidation', 'class' => 'form-horizontal']) !!}
                    <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
                        <div class="col-sm-12">
                            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password')]) !!}
                            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('password_confirm') ? 'has-error' : '' }}">
                        <div class="col-sm-12">
                            {!! Form::password('password_confirm', ['id' => 'password_confirm', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password_confirm')]) !!}
                            <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            {!! Form::submit(trans('auth.title.password_change'), ['class' => 'btn btn-default']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	  @include('auth.formvalidation.login')
@endsection
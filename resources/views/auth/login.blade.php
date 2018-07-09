@extends('layout.principal')

@section('title', '| '.trans('auth.title.login'))

@section('styles')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                {!! Form::open(['route' => 'login', 'method' => 'post', 'id' => 'formValidation', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('previous', $previous) !!}
                    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                        <div class="col-sm-12">
                                  {!! Form::text('email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
                            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
                        <div class="col-sm-12">
                            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password')]) !!}
                            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ link_to_route('forgot-password', trans('auth.title.password_recovery_text')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            {!! Form::submit(trans('auth.title.login'), ['class' => 'btn btn-default']) !!}
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
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
        <div class="col-md-12">
            <h1>{{ $item->name }}</h1>
            {!! Form::open(['route' => 'add-product-to-cart', 'method' => 'post', 'id' => 'formValidation', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('id', $item->id) !!}
                {!! Form::hidden('quantity', 1) !!}
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        {!! Form::submit(trans($active.'.add-to-cart'), ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@extends('layout.principal')

@section('title', '| '.trans($active.'.title'))

@section('styles')
	{{-- NavBar CSS file --}}
    {{ Html::style('assets/css/search.css') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>{{ trans($active.'.title') }}</h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-3">
    		
    	</div>
    	<div class="col-sm-9">
    		<div class="row">
    			@foreach($products as $product)
    				<div class="col-xs-6 col-md-4 text-center">
                        <a href="{{ URL::route('detail', [$product->slug]) }}" class="search-link-product">
                            <div class="search-img-product" style="background-image: url('{{ URL::to('uploads/suppliers/products/'.$product->img_1) }}')">
                                
                            </div>
	    					<p>{{ $product->name }}</p>
	    				</a>
    				</div>
    			@endforeach
    		</div>
    		<div class="row">
    			<div class="col-sm-12">
    				<div class="col-xs-12 text-center">
						{!! $products->appends(Request::all())->render() !!}
					</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

@section('scripts')
@endsection
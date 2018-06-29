@extends('layout.principal')

@section('title', '| '.trans($active.'.title'))

@section('styles')
    {{-- Custom --}}
    {{ Html::style('assets/css/cart.css') }}
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
            <h1>{{ trans($active.'.title') }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-9 col-lg-10">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<td></td>
							<td>{{ trans('validation.attributes.price') }}</td>
							<td class="text-right">{{ trans('validation.attributes.quantity') }}</td>
						</tr>
					</thead>
					<tbody>
						@php
							$quantity = 0;
							$subtotal = 0;
						@endphp
						@foreach($cart as $item)
							<tr>
								<td>
									<a href="{{ URL::to('search/'.$item->slug) }}" class="cart-float-left">
										<img src="{{ URL::to('uploads/suppliers/products/'.\App\Product::find($item->id)->img_1) }}" alt="Product" class="img-preview">
									</a>
									<div class="cart-float-left">
										<p><span class="cart-product-name"><a href="{{ URL::to('search/'.\App\Product::find($item->id)->slug) }}">{{ \App\Product::find($item->id)->name }}</a></span></p>
									    {{ link_to_route('delete-product-of-cart', trans('strings.crud.delete'), [$item->id], ['class' => 'cart-product-delete']) }}
									</div>
								</td>
								<td>
									<p class="cart-product-price">${{ number_format(\App\Product::find($item->id)->price, 2) }}</p>
								</td>
								<td class="text-right">
									{{ $item->quantity }}
								</td>
							</tr>
							@php
								$quantity += $item->quantity;
								$subtotal += $item->quantity * $item->price;
							@endphp
					    @endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4" class="text-right">
								<p><span class="cart-subtotal">{{ trans($active.'.subtotal') }} ({{ $quantity }} {{ $quantity == 1 ? trans($active.'.product') : trans($active.'.products') }}):</span> <span class="cart-product-price">${{ number_format($subtotal, 2) }}</span></p>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-2">
		    @if(count($cart) > 0)
		    	<p class="cart-subtotal">{{ trans($active.'.subtotal') }} ({{ $quantity }} {{ $quantity == 1 ? trans($active.'.product') : trans($active.'.products') }}):</p>
		    	<p class="cart-product-price">${{ number_format($subtotal, 2) }}</p>
		    	{{ link_to('confirm-purchase', trans('confirm-purchase.title'), ['class' => 'btn btn-success col-xs-12']) }}
		    @endif
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<p class="cart-policies">{{ trans($active.'.cart-policies') }}</p>
			<p class="cart-policies">{{ trans($active.'.cart-code') }}</p>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
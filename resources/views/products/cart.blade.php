@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Cart Items') }}
    </div>

    <div class="card-body">
        @foreach($carts as $cart)
            <div class="row mb-2 p-2" style="border: 1px solid black;">
                <div class="col-2 text-center">
                    {{ $cart->product_name }}
                </div>
                <div class="col-4 text-center">
                    {{ $cart->description }}
                </div>
                <div class="col-2 text-center">
                    {{ $cart->price }}
                </div>
                <div class="col-2 text-center">
                    {{ $cart->quantity }}
                </div>
                <div class="col-2 text-center">
                    <a class="btn btn-danger" href="{{ route('products.cart.remove', $cart->id) }}">
                        {{ __('Delete') }}
                    </a>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 mt-4">
                <a class="btn btn-warning w-100" href="{{ route('products.index') }}">{{ __('Go Back') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection

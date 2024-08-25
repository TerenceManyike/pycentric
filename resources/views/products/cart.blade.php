@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Cart Items') }}
    </div>

    @php
        $cart_total = 0.00;
    @endphp

    <div class="card-body mobile-font-size">
        @foreach($carts as $cart)
            <div class="row mb-2 p-2" style="border: .1px solid black; border-radius: 10px;">
                <div class="col-2 text-center">
                    {{ $cart->product_name }}
                </div>
                <div class="col-4 text-center">
                    {{ $cart->description }}
                </div>
                <div class="col-2 text-center">
                    {{ $cart->quantity }}
                </div>
                <div class="col-2 text-center">
                    R {{ $cart->price * $cart->quantity }}
                </div>
                <div class="col-2 text-center">
                    <a class="btn btn-danger" href="{{ route('products.cart.remove', $cart->id) }}">
                        {{ __('Delete') }}
                    </a>
                </div>
            </div>
            @php
                $cart_total = $cart_total + $cart->price * $cart->quantity;
            @endphp
        @endforeach

        <div class="row">
            <div class="col-12 mt-2 text-right">
                TOTAL = <b>R {{ $cart_total }}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <a class="btn btn-warning w-100" href="{{ route('products.index') }}">{{ __('Go Back') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Product Details') }}
    </div>

    <div class="card-body">
        <div class="row p-2" style="border: 1px solid black;">
            <div class="col-2 text-center">
                {{ $product->name }}
            </div>
            <div class="col-4 text-center">
                {{ $product->description }}
            </div>
            <div class="col-2 text-center">
                {{ $product->price }}
            </div>
            <div class="col-2 text-center">
                {{ $product->quantity }}
            </div>
            <div class="col-2 text-center">
                <a class="btn btn-success" href="{{ route('products.cart.add', $product->id) }}">
                    {{ __('Add To Cart') }}
                </a>
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


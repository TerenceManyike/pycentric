@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Create Product') }}
    </div>

    <div class="card-body mobile-font-size">
        <form method="POST" action="{{ route("products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ __('Name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" placeholder="{{ __('Name') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ __('') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ __('Price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" placeholder="{{ __('Price') }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ __('') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ __('Quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" placeholder="{{ __('Quantity') }}" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ __('') }}</span>
            </div>
            <div class="form-group">
                <label for="description" class="required">{{ __('Description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" placeholder="{{ __('Description') }}" required></textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ __('') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
        <div class="row">
            <div class="col-12 mt-4">
                <a class="btn btn-warning w-100" href="{{ route('products.index') }}">{{ __('Go Back') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection

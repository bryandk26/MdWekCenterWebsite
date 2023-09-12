@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        @if (Auth::check())
            @if (Auth::user()->role_as==1)
                @foreach ($viewProduct as $prod)
                    <div style="display: flex; justify-content: space-evenly">
                        <img src="{{ Storage::url($prod->product_image) }}" class="card-img-top" alt="{{ $prod -> product_title }}" style="width: 600px">
                        <div>
                            <h3 class="card-title">{{ $prod -> product_title }}</h3>
                            <p class="card-text">Description: <p style="border: black 1px solid">{{ $prod -> product_description }}</p></p>
                            <p class="card-text">Stock: <br>{{ $prod -> product_stock }} piece(s)</p>
                            <p class="card-text">Price: <br> Rp. {{ $prod -> product_price }} ,-</p>
                        </div>
                    </div>
                        {{-- <div class="card-body">
                            <h5 class="card-title">{{ $prod -> product_title }}</h5>
                            <a href="#" class="btn btn-danger mb-2">Go somewhere</a>
                            <a href="/productdetail/{{ $prod->id }}" class="btn btn-primary">Product Detail</a>
                        </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
                @endforeach
            @else
                @foreach ($viewProduct as $prod)
                <div style="display: flex; justify-content: space-evenly">
                    <img src="{{ Storage::url($prod->product_image) }}" class="card-img-top" alt="{{ $prod -> product_title }}" style="width: 600px">
                    <div>
                        <div>
                            <h3 class="card-title">{{ $prod -> product_title }}</h3>
                            <p class="card-text">Description: <p class="breadcrumb-item active" style="border: black 1px solid">{{ $prod -> product_description }}</p></p>
                            <p class="card-text">Stock: <br>{{ $prod -> product_stock }} piece(s)</p>
                            <p class="card-text">Price: <br> Rp. {{ $prod -> product_price }} ,-</p>
                        </div>
                        <br>
                        <div>
                            <h3>Add to Cart</h3>
                            {{-- <p class="card-text">Quantity: </p> --}}
                            <form method="POST" action="/addCart">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $prod->id }}">
                                <div class="row mb-3">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('Quantity') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="quantity" type="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity">
        
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    {{-- <div class="card-body">
                        <h5 class="card-title">{{ $prod -> product_title }}</h5>
                        <a href="#" class="btn btn-danger mb-2">Go somewhere</a>
                        <a href="/productdetail/{{ $prod->id }}" class="btn btn-primary">Product Detail</a>
                    </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
                @endforeach
            @endif
        @else
            @foreach ($viewProduct as $prod)
            <div style="display: flex; justify-content: space-evenly">
                <img src="{{ Storage::url($prod->product_image) }}" class="card-img-top" alt="{{ $prod -> product_title }}" style="width: 600px">
                <div>
                    <h3 class="card-title">{{ $prod -> product_title }}</h3>
                    <p class="card-text">Description: <p style="border: black 1px solid">{{ $prod -> product_description }}</p></p>
                    <p class="card-text">Stock: <br>{{ $prod -> product_stock }} piece(s)</p>
                    <p class="card-text">Price: <br> Rp. {{ $prod -> product_price }} ,-</p>
                </div>
            </div>
            @endforeach        
        @endif
        </div>
    </div>

@endsection
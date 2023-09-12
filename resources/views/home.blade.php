@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        {{-- <form class="form-inline mb-3" style="justify-content: space-evenly">
            <input class="form-control mr-sm-2 mb-1" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
         <div class="col-md-12 mb-4"></div>
                @foreach ($viewProduct as $prod)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($prod->product_image) }}" class="card-img-top" alt="{{ $prod -> product_title }}" >
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod -> product_title }}</h5>
                            <p class="card-text">{{ $prod -> product_description }}</p>
                            @if(Auth::check())
                            @if (Auth::user()->role_as==1)
                            <a href="/updateproduct/{{ $prod->id }}" class="btn btn-danger mb-2">Update Product</a>
                            @endif
                            @endif
                            <a href="/productdetail/{{ $prod->id }}" class="btn btn-primary">Product Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $viewProduct->links() }}
   
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <form action="" class="container d-flex justify-content-center align-items-center mt-2" method="GET">
        <select name="category" id="category" class="form-control w-25">
            <option value="">Pilih Kategori</option>
            <option value="Animal" {{Request::query('category') == 'Animal' ? 'selected' : ''}}>Animal</option>
            <option value="Food" {{Request::query('category') == 'Food' ? 'selected' : ''}}>Food</option>
            <option value="Drink" {{Request::query('category') == 'Drink' ? 'selected' : ''}}>Drink</option>
        </select>
        <input type="text" class="form-control w-50 me-2" placeholder="Search.." name="searching" value="{{Request::query('searching')}}">
        <button class="btn bg-primary" type="submit">Search</button>
    </form>
    
    @foreach ($products as $prod)
                <div class="col-md-4 mt-4">
                    <div class="card mb-3" style="width: 18rem;">
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
    {{ $products->links() }}
    </div>
</div>
@endsection
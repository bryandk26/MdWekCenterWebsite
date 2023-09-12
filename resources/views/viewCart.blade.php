@extends('layouts.app')

@section('content')
<div class="container" style="width: 50%">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0
                ?>
                @foreach ($carts as $cart)
                <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{$cart->product->product_title}}</td>
                        <td>{{$cart->product->product_price}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{$cart->quantity * $cart->product->product_price}}</td>
                        <td>
                            <a href= {{"deleteCart/".$cart['id']}} ><button class="btn btn-danger"> Delete</button></a>
                        </td>
                    </tr>
                <?php
                    $total = $total + ($cart->product->product_price * $cart->quantity)
                ?>
                @endforeach
            </tbody>
        </table>
        <p>Grand Total: Rp {{ $total }}</p>
        <form action="/checkout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ __('Checkout') }}
            </button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container" style="width: 50%">
    <div class="row justify-content-center">
        <h1>Transaction</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Time</th>
                <th scope="col">Detail</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trans as $tran)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$tran->created_at}}</td>
                    <td>
                        {{-- <a href="/detailTrans/{{$trans->id}}" class="btn btn-primary">Detail Transaction</a> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container" style="width: 50%">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Name</th>
                <th scope="col">Button</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <a href= {{"delete/".$user['id']}} ><button class="btn btn-danger"> Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
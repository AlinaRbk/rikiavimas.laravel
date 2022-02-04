@extends('layouts.app')

@section('content')
    <div class='container'>
        <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Description</th>
        </tr>
        @foreach ($searchs as $search)
        <tr>
            <td>{{$search->id}}</td>
            <td>{{$search->name}}</td>
            <td>{{$search->surname}}</td>
            <td>{{$search->username}}</td>
            <td>{{$search->description}}</td>
         </tr>

        @endforeach
        </table>
    </div>

@endsection
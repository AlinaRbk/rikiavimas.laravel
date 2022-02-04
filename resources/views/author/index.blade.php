@extends('layouts.app')

@section('content')
<div class="container">
    
    <form method="GET" action="{{route('author.index')}}">
        @csrf
        <!-- <input name ="sortCollumn" type ="text" /> -->
       <select name ="sortCollumn">
            <!-- <option value="id">ID</option>
            <option value="name">Name</option>
            <option value="surname">Surname</option>
            <option value="username">Username</option>
            <option value="description">Description</option> -->
            @foreach($select_array as $item)
            <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select>
        <select name ="sortOrder" >
            @if ($sortOrder == 'asc' || empty ($sortOrder))
                <option value="asc" selected>Ascenting</option>
                <option value="desc">Descenting</option>
            @else
                <option value="asc">Ascenting</option>
                <option value="desc" selected>Descenting</option>
            @endif          
        </select>
        <button type="submit">Rikiuok</button>
    </form>
    <div class="test">
        {{$sortCollumn}}
        {{$sortOrder}}
    </div>
    <div class="search_form">
        <form action="{{route('author.search')}}" method="GET">
            @csrf
            <input type="text" name="search_key" placeholder="search..."/>
            <button type="submit">ieskok</button>
</form>

</div>

    <table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Description</th>
    </tr>


        @foreach ($authors as $author)
        <tr>
            <td>{{$author->id}}</td>
            <td>{{$author->name}}</td>
            <td>{{$author->surname}}</td>
            <td>{{$author->username}}</td>
            <td>{{$author->description}}</td>

         </tr>
    @endforeach
    </table>

</div>
@endsection
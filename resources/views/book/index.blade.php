@extends('layouts.app')

@section('content')
    <div class='container'>
    <form method="GET" action="{{route('book.index')}}">
        @csrf
        <!-- <input name ="sortCollumn" type ="text" /> -->
       <select name ="sortCollumn">
           
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
        <form action="{{route('book.index')}}" method="GET">
            @csrf
            <input type="text" name="search_key" placeholder="search..."/>
            <button type="submit">ieskok</button>
</form>
        <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author_id</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->author_id}}</td>
         </tr>

        @endforeach
        </table>
    </div>

@endsection
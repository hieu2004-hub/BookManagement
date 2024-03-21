@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        <p><a href="{{ route('book.create')}}" class="btn btn-primary btn-sm">Add</a></p>
        <a href="{{ route('book.index')}}" class="btn btn-primary btn-sm">Home</a><br><br>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

{{--        <p>Total: {{ $book -> count() }}</p>--}}

        <br>

        <table class="table">
            <form>
                <input aria-label="Find" class="form-control" name="find" placeholder="Find">
                <button hidden type="submit"></button><br>
            </form>
            <thead>
            <tr class="table-warning" style="text-align: center">
                <td>ISBN</td>
                <td>Image</td>
                <td>Price</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($book as $row)
                <tr style="text-align: center">
                    <td>{{$row->isbn}}</td>
                    <td><img src="{{$row->img}}" alt="404" width="50px" height="50px"></td>
                    <td>{{$row->price}}</td>
                    <td class="text-center">
                        <a href="{{ route('book.edit', $row->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('book.show', $row->id)}}" class="btn btn-primary btn-sm">View</a>
                        <form action="{{ route('book.destroy', $row->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

            <div>
                {!! $book -> links() !!}
            </div>
        <div>
@endsection

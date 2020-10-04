{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">

        @if (session('error'))
            <div class="alert alert-danger w-100" style="margin: 50px 0px;">
                <button type="button" class="close" data-dismiss="alert" style="margin-left: 10px;">&times;</button>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success w-100">
                <button type="button" class="close" data-dismiss="alert" style="margin-left: 10px;">&times;</button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        
            @foreach($books as $book)
            <div style="width: 100%;">
                <div class="card mb-3" style="max-width: 540px; margin: 10px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ $book['coverLarge'] }}" class="card-img" alt="book-cover" style="max-height: 100vw;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book['title'] }}</h5>
                                <p class="card-text"><b>Author: </b>{{ $book['author'] }}</p>
                                <p class="card-text"><b>Published Year: </b> {{ $book['publishedYear'] }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        <a href="{{ url('/book/edit/'. $book['id'] ) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/book/delete/'. $book['id'] ) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            </div>
            

            @endforeach

    </div>

@endsection
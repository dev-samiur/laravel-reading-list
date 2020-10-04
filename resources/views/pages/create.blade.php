{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="container">

        @if (session('error'))
             <div class="alert alert-danger" style="margin: 50px 0px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif

        <h1 class="header-create">Create</h1>

        <form action="{{ url('/dashboard/search') }}" method="POST" style="margin: 50px 0px;">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Enter book title" style="max-width: 400px;">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>

        </form>

        @if ( !empty($books) ) 

            <ul class="list-group list-group-flush" style="margin: 50px 0px;">

                @foreach ( $books['items'] as $book )
                    <li class="list-group-item" style="max-width: 500px; cursor: pointer"><a href="{{ url('/dashboard/search/'.$book['id']) }}" style="color: inherit; font-size: 16px;">{{ $book['volumeInfo']['title'] }}</a></li>
                @endforeach

            </ul>

        @endif

        @if ( !empty($bookDetails) ) 
            @include('pages.bookform', ['book' => $bookDetails['items'][0], 'operation' => 'create'])  
        @endif 

    </div>




@endsection

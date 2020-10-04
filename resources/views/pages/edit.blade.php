{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <h1>Edit</h1>

    @if ( !empty($book) ) 
        @include('pages.bookform', ['book' => $book, 'operation' => 'edit'])
    @endif

@endsection
{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="row">

    <h1 class="header-create" style="margin: 0px 20px;">Register</h1>

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

    @if( Auth::user()->permission == 1 )

        <form action="{{ url('/admin/register') }}" method="post" style="margin: 50px 20px;">
            @csrf
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="name" style="margin-left: 5px;">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email" style="margin-left: 5px;">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPass" class="col-sm-2 col-form-label">Password: </label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPass" name="password" placeholder="password" style="margin-left: 5px;">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    
        @else
            <div class="alert alert-danger w-100" style="margin: 50px 0px;">You do not have the permission to add new admin</div>

    @endif

</div>


@endsection
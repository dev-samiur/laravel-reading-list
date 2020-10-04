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

    @if ( !empty($admins) )

        @foreach($admins as $admin)

            <div style="width: 100%;">
                <div class="card mb-3" style="max-width: 540px; margin: 10px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><b>Name: </b>{{ $admin['name'] }}</p>
                                <p class="card-text"><b>Email: </b> {{ $admin['email'] }} </p>
                            </div>
                        </div>
                    </div>
                    @if($admin['permission'] != 1)
                        <div class="card-footer bg-transparent border-success">
                            @if( Auth::user()->permission == 1)
                                <a href="{{ url('/admin/delete/'. $admin['id'] ) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            @else
                                <a href="#" class="btn btn-danger" onclick="return alert('You do not have the permission')">Delete</a>
                            @endif 
                        </div>
                    @endif
                </div>
            </div>

        @endforeach

    @endif

    </div>

@endsection
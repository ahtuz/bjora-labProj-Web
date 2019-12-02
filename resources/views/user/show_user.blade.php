@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

        <div class="card">
            <div class="card-header">Profile</div>
                <div class="card-body shadow-sm">
                    <div class="position-relative d-flex justify-content-start">
                        <div class="d-inline mr-4">
                            <img src="{{ asset('storage/profile_pictures/'.$user->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:120px; height:120px;">
                        </div>
                        <div class="d-inline">
                            <h3>{{ $user->username }}</h5>
                            <h6>{{ $user->birthday }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

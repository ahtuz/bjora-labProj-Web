@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

        <div class="card">
            <div class="card-header">Profile</div>
                <div class="card-body shadow-sm">
                    <div class="position-relative d-flex justify-content-between">
                        <div class="position-relative d-flex">
                            <div class="d-inline mr-4">
                                <img src="{{ asset('storage/profile_pictures/'.$user->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:120px; height:120px;">
                            </div>
                            <div class="d-inline">
                                <h3>{{ $user->username }}</h3>
                                <h6>{{ $user->email }}</h6>
                                <h6>{{ $user->address }}</h6>
                                <h6>{{ $user->birthday }}</h6>
                            </div>
                        </div>

                        <!-- validasi edit profile; tampilkan bila user sekarang adalah auth -->
                        @if( Auth::id() == $user->id )
                            <div class="d-inline">
                                <a class="btn btn-primary justify-content-end" href="#" role="button">Edit Profile</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- validasi message; tampilkan bila user sekarang bukan auth -->
    @if( Auth::id() == $user->id )

        @else
        <div class="row justify-content-center">

            <div class="col-md-5">

            <div class="card">
                <div class="card-header">Send Message to {{ $user->username }}</div>
                    <div class="card-body shadow-sm d-inline">
                        <form method="POST" action="#">
                            <textarea class="form-control d-inline" id="message" rows="4" name="message"></textarea>
                        </form>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary" href="#" role="button">Send Message</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            @if ( session('status') )
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Inbox</div>
                @foreach($messages as $message)
                    <div class="card-body shadow-sm">
                        <div class="created_at text-secondary font-italic position-relative d-flex justify-content-end">{{ $message->created_at->diffForHumans() }}</div>
                        <div class="position-relative d-flex">
                            <div>
                                <div class="d-inline mr-2">
                                    <a href="/user/{{ $message->sender_id }}"><img src="{{ asset('storage/profile_pictures/'.$message->sender->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:50px; height:50px;"></a>
                                </div>
                                <div class="d-inline">
                                    <a class="text-dark" style="text-decoration:none;" href="/user/{{ $message->sender_id }}">{{ $message->sender->username }}
                                    </a>
                                </div>
                                <h3 class="text-dark mt-2">{{ $message->message_detail }}</h3>
                            </div>
                        </div>
                        <div class="d-flex position-relative justify-content-end">
                            <a class="btn btn-danger mt-1" href="{{route('admin_delete_message', $message->id)}}" role="button">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container m-2">
                <div class="row justify-content-center">{{ $messages->links() }}</div>                
            </div>
        </div>
    </div>
</div>
@endsection

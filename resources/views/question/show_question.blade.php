@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow-sm">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex font-weight-bold text-danger justify-content">
                            {{ $question->question_label }}
                        </div>
                        @if( $question->status == 1 )
                            <div class="d-inline">
                                <a href="#" style="text-decoration:none;" class="text-white badge badge-pill badge-success">Open</a>
                            </div>
                        @else
                            <div class="d-inline">
                                <a href="#" style="text-decoration:none;" class="text-white align-middle badge badge-pill badge-danger">Closed</a>
                            </div>
                        @endif
                    </div>
                    
                    <h2>{{ $question->question_detail }}</h2>
                    <div class="created_at text-secondary font-italic">Created at: {{ $question->created_at }}</div>
                    <div class="position-relative d-flex justify-content-end">
                        <div> 
                            <div class="d-inline mr-2">{{ $question->user->username }}</div>
                            <div class="d-inline">
                                <img src="{{ asset('storage/profile_pictures/'.$question->user->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:50px; height:50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                    <div class="card-header">Answers</div>
                    @foreach ( $question->answer->answer_detail as $answer)
                        <div class="card-body shadow-sm">
                            {{ $answer }}
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

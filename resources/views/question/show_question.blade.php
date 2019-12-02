@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow-sm">
                    <div class="position-relative d-flex justify-content-end font-weight-bold text-danger">{{ $question->question_label }}</div>
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
                    <div class="card-body shadow-sm">
                    
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

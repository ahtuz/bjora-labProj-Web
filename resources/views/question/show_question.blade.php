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
            @if( Auth::id() == $question->user->id )

                @else
                <br>
                <div class="card">
                    <div class="card-header">Add Your Answer</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('add_answer', $question->id) }}">
                            @csrf
                            <textarea class="form-control d-inline" id="answer_detail" rows="4" name="answer_detail"></textarea>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    Submit Answer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            <br>
            <div class="card">
                <div class="card-header">Answers</div>
                @foreach ( $answer as $a )
                    <div class="card-body shadow-sm">
                        <div class="d-flex mb-3">
                            <div class="mr-3">
                                <a href="/user/{{ $a->user->user_id }}"><img src="{{ asset('storage/profile_pictures/'.$a->user->profile_picture) }}" alt="No Image" class="rounded-circle" srcset="" style="width:50px; height:50px;"></a>
                            </div>
                            <div class="d-inline">
                                <a class="mt-1 text-dark d-block position-relative" style="text-decoration:none;" href="/user/{{ $a->user->user_id }}">{{ $a->user->username }}
                                </a>
                                <div class="answer-date mb-1 text-dark d-block position-relative">{{ $a->updated_at }}
                                </div>
                            </div>
                        </div>
                        <div>{{ $a->answer_detail }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow-sm">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex font-weight-bold text-danger justify-content">
                            {{ $question->label->question_label }}
                        </div>
                        @guest
                            @if($question->status == 1)
                                <div class="d-block">
                                    <span class="badge badge-pill badge-success">Open</span>
                                </div>
                            @else
                                <div class="d-block">
                                    <span class="badge badge-pill badge-danger">Close</span>
                                </div>
                            @endif
                        @else
                            @if( Auth::user()->role == "admin" )
                                @if($question->status == 1)
                                    <form action="{{ route('admin_change_status', $question->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <button type="sumbit" class="text-white badge badge-pill badge-success" name="status" value="0">Open</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin_change_status', $question->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <button type="sumbit" class="text-white align-middle badge badge-pill badge-danger" name="status" value="1">Close</button>
                                    </form>
                                @endif
                            @elseif( Auth::id() == $question->user_id )
                                @if($question->status == 1)
                                    <form action="{{ route('change_status', $question->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <button type="sumbit" class="text-white badge badge-pill badge-success" name="status" value="0">Open</button>
                                    </form>
                                @else
                                    <form action="{{ route('change_status', $question->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <button type="sumbit" class="text-white align-middle badge badge-pill badge-danger" name="status" value="1">Close</button>
                                    </form>
                                @endif
                            @elseif( Auth::id() != $question->user_id )
                                @if($question->status == 1)
                                    <div class="d-block">
                                        <span class="badge badge-pill badge-success">Open</span>
                                    </div>
                                @else
                                    <div class="d-block">
                                        <span class="badge badge-pill badge-danger">Close</span>
                                    </div>
                                @endif
                            @endif
                        @endguest
                    </div>
                    <h2>{{ $question->question_detail }}</h2>
                    <div class="created_at text-secondary font-italic">Asked at {{ $question->created_at->diffForHumans() }}</div>
                    <div class="position-relative d-flex justify-content-end">
                        <div>
                            <a class="text-dark mr-2" style="text-decoration:none;" href="/user/{{ $question->user_id }}">{{ $question->user->username }}
                            </a>
                            <div class="d-inline">
                            <a href="/user/{{ $question->user_id }}"><img src="{{ asset('storage/profile_pictures/'.$question->user->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:50px; height:50px;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @guest

            @else
                @if( Auth::id() == $question->user->id )
                    @else
                        @if( $question->status == 1)
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
                @endif
            @endguest
            <br>
            <div class="card">
                <div class="card-header">Answers</div>
                @foreach ( $answer as $a )
                    <div class="card-body shadow-sm">
                        <div class="d-flex mb-3">
                            <div class="mr-3">
                                <a href="/user/{{$a->user_id}}"><img src="{{ asset('storage/profile_pictures/'.$a->user->profile_picture) }}" alt="No Image" class="rounded-circle" srcset="" style="width:50px; height:50px;"></a>
                            </div>
                            <div class="d-inline">
                                <a class="mt-1 text-dark d-block position-relative" style="text-decoration:none;" href="/user/{{ $a->user_id }}">{{ $a->user->username }}
                                </a>
                                <div class="answer-date mb-1 text-dark d-block position-relative">Answered at {{ $a->updated_at }}
                                </div>
                            </div>
                        </div>
                        <div>{{ $a->answer_detail }}</div>
                        @if( Auth::id() == $a->user_id)
                            <div class="d-flex position-relative justify-content-end mt-1">
                                <a href="{{ route('edit_answer', $a->id) }}" class="badge badge-success mr-1">Edit</a>
                                <a href="{{ route('delete_answer', $a->id) }}" class="badge badge-danger">Delete</a>
                            </div>
                            @elseif( Auth::user()->role == "admin")
                            <div class="d-flex position-relative justify-content-end mt-1">
                                <a href="{{ route('admin_edit_answer', $a->id) }}" class="badge badge-success mr-1">Edit</a>
                                <a href="{{ route('admin_delete_answer', $a->id) }}" class="badge badge-danger">Delete</a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

        <form method="GET" class="mb-3 w-50" action="{{ route('home_search') }}">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search by username or question...">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
            <div class="card">
                <div class="card-header">Questions</div>
                @foreach($questions as $question)
                    <div class="card-body shadow-sm">
                        <div class="position-relative d-flex justify-content-end font-weight-bold text-danger">{{ $question->label->question_label }}</div>
                        <a style="text-decoration:none;" href="/question/{{ $question->id }}">
                            <h3 class="text-dark">{{ $question->question_detail }}</h3>
                        </a>
                        <div class="created_at text-secondary font-italic">Created at: {{ $question->created_at->diffForHumans() }}</div>
                        <div class="position-relative d-flex justify-content-end">
                            <div> 
                                <div class="d-inline mr-2">
                                    <a class="text-dark" style="text-decoration:none;" href="/user/{{ $question->user_id }}">{{ $question->user->username }}
                                    </a>
                                </div>
                                <div class="d-inline">
                                    <a href="/user/{{ $question->user_id }}"><img src="{{ asset('storage/profile_pictures/'.$question->user->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:50px; height:50px;"></a>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="/question/{{ $question->id }}" role="button">Answer</a>
                    </div>
                @endforeach
            </div>
            <div class="container m-2">
                <div class="row justify-content-center">{{ $questions->links() }}</div>                
            </div>
        </div>
    </div>
</div>
@endsection

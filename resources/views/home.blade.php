@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

        <form method="GET" class="mb-3 w-50" action="{{ route('home') }}">
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Search by username or question...">
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
                        $asker_id => $question->user_id
                        <div>{{ $question->question_label }}</div>
                        <div>{{ $question->question_detail }}</div>
                        <div>{{ $users->$asker_id }}</div>
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

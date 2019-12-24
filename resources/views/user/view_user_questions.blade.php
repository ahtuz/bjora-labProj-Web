@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

        <form method="GET" class="mb-3 w-50" action="{{ route('user_question_search', $user) }}">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search by question...">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
            <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Question Detail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <th scope="row" class="align-middle">{{ $question->id }}</th>
                        <td class="align-middle">{{ $question->label->question_label }}</td>
                        <td class="align-middle">{{ $question->user->username }}</td>
                        <td class="align-middle">{{ $question->question_detail }}</td>
                        <td class="align-middle">
                            @if($question->status == 1)
                            <form action="{{ route('change_status', $question->id) }}" method="POST">
                            {{csrf_field()}}
                                <button type="sumbit" class="btn btn-sm btn-success" name="status" value="0">Open</button>
                            </form>
                            @else
                            <form action="{{ route('change_status', $question->id) }}" method="POST">
                            {{csrf_field()}}
                                <button type="sumbit" class="btn btn-sm btn-danger" name="status" value="1">Close</button>
                            </form>
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="d-flex">
                                <a href="{{ route('show_question', $question->id) }}" class="badge badge-secondary d-inline mr-1">View</a>
                                <a href="{{ route('edit_question', $question->id) }}" class="badge badge-success d-inline mr-1">Edit</a>
                                <a href="{{ route('delete_question', $question->id) }}" class="badge badge-danger d-inline">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <div class="container m-2">
                <div class="row justify-content-center">{{ $questions->links() }}</div>                
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            @if ( session('status') )
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <a href="{{ route('add_label') }}">
                <button type="button" class="btn btn-success btn mb-4">Add New Label</button>
            </a>
            <div class="card mb-3">
                <div class="card-header">{{ __('Question Labels') }}</div>
                <ul class="list-group">
                    @foreach($question_labels as $question_label)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $question_label->question_label }}
                            <div>
                                <a href="{{ route('edit_label', $question_label->id) }}">
                                    <button type="button" class="btn btn-success btn-sm">Edit</button>
                                </a>
                                <a href="{{ route('delete_label', $question_label->id) }}">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="d-flex justify-content-center">{{ $question_labels->links() }}</div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Question Label') }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/label">
                        @csrf

                        <div class="form-group row">
                            <label for="question_label" class="col-md-4 col-form-label text-md-right">{{ __('Question Label') }}</label>

                            <div class="col-md-6">
                                <input id="question_label" type="text" class="form-control @error('question_label') is-invalid @enderror" name="question_label" required autocomplete="question_label" autofocus>

                                @error('question_label')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Question Label') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
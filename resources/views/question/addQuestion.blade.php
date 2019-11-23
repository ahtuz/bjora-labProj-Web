@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Question') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addQuestion') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

                            <div class="col-md-6">
                            <select class="custom-select @error('question') is-invalid @enderror" name="question" id="question" type="text" value="{{ old('question') }}">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                                @error('question')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="questionLabel" class="col-md-4 col-form-label text-md-right">{{ __('questionLabel') }}</label>

                            <div class="col-md-6">
                                <input id="questionLabel" type="text" class="form-control @error('questionLabel') is-invalid @enderror" name="questionLabel" value="{{ old('questionLabel') }}" required autocomplete="questionLabel" autofocus>

                                @error('questionLabel')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Quesiton') }}
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

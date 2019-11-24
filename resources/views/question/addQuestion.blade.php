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
                            <label for="question" class="col-md-3 col-form-label text-md-right">{{ __('Question') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control @error('question') is-invalid @enderror" id="question" rows="8" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus></textarea>

                                @error('question')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="questionLabel" class="col-md-3 col-form-label text-md-right">{{ __('Question Label') }}</label>

                            <div class="col-md-8">
                            <select class="custom-select @error('questionLabel') is-invalid @enderror" name="questionLabel" id="questionLabel" type="text" value="{{ old('questionLabel') }}">
                                <option selected value="unspecified">Unspecified</option>
                                <option value="art">Art</option>
                                <option value="gaming">Gaming</option>
                                <option value="finance">Finance</option>
                                <option value="health">Health</option>
                                <option value="music">Music</option>
                                <option value="technology">Technology</option>
                            </select>
                                @error('question')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="p-2">
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

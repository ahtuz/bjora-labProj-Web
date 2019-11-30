@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Question') }}</div>
                <div class="card-body">
                    <form method="POST" action="/question">
                        @csrf

                        <div class="form-group row">
                            <label for="question_detail" class="col-md-3 col-form-label text-md-right">{{ __('Question Detail') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control @error('question_detail') is-invalid @enderror" id="question_detail" rows="8" name="question_detail" value="{{ old('question_detail') }}" required autocomplete="question_detail" autofocus></textarea>

                                @error('question_detail')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="question_label" class="col-md-3 col-form-label text-md-right">{{ __('Question Label') }}</label>

                            <div class="col-md-8">
                            <select class="custom-select @error('question_label') is-invalid @enderror" name="question_label" id="question_label" type="text" value="{{ old('question_label') }}">
                                <option selected value="Unspecified">Unspecified</option>
                                <option value="Art">Art</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Finance">Finance</option>
                                <option value="Health">Health</option>
                                <option value="Music">Music</option>
                                <option value="Technology">Technology</option>
                            </select>
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

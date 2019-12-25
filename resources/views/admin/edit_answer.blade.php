@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Answer') }}</div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="answer_detail" class="col-md-3 col-form-label text-md-right">{{ __('Answer Detail') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control @error('answer_detail') is-invalid @enderror" id="answer_detail" rows="8" name="answer_detail" required autocomplete="answer_detail" autofocus>{{ $answer->answer_detail }}</textarea>

                                @error('answer_detail')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Edits') }}
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

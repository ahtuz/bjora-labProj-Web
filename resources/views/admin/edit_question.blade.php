@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Question') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin_update_question', $question->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="question_detail" class="col-md-3 col-form-label text-md-right">{{ __('Question Detail') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control @error('question_detail') is-invalid @enderror" id="question_detail" rows="8" name="question_detail" required autocomplete="question_detail" autofocus>{{ $question->question_detail }}</textarea>

                                @error('question_detail')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label_id" class="col-md-3 col-form-label text-md-right">{{ __('Question Label') }}</label>

                            <div class="col-md-8">
                            <select class="custom-select @error('label_id') is-invalid @enderror" name="label_id" id="label_id" type="text">
                                <!-- show the actual (original) selected question topic/label -->
                                @foreach ($labels as $l)
                                    @if( $l->id === $question->label_id )
                                        <option value="{{ $l->id }}">{{ $l->question_label }}</option>
                                    @endif
                                @endforeach
                                
                                <!-- show the rest of labels/topics -->
                                @foreach ($labels as $l)
                                    @if( $l->id != $question->label_id )
                                        <option value="{{ $l->id }}">{{ $l->question_label }}</option>
                                    @endif
                                @endforeach
                            </select>
                                @error('label_id')
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

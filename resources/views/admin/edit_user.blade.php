@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/{{ $user->id }}/edit" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6 mt-2">
                                @if($user->gender == "Male")
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                                        <label class="form-check-label" for="gender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                                        <label class="form-check-label" for="gender">Female</label>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                                        <label class="form-check-label" for="gender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                                        <label class="form-check-label" for="gender">Female</label>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address" required autocomplete="address" autofocus>{{ $user->address }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->birthday }}" required autocomplete="birthday">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            
                        <div class="col-md-6 mt-2">
                                @if($user->role == "admin")
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input" type="radio" name="role" id="role" value="admin">
                                        <label class="form-check-label" for="role">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role" value="Member">
                                        <label class="form-check-label" for="role">Member</label>
                                    </div>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @else
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role" value="admin">
                                        <label class="form-check-label" for="role">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input checked class="form-check-input" type="radio" name="role" id="role" value="Member">
                                        <label class="form-check-label" for="role">Member</label>
                                    </div>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>             

                        <div class="form-group row">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-right">{{ __('Upload Profile Picture') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="profile_picture" class="custom-file-input @error('profile_picture') is-invalid @enderror" id="profile_picture">
                                    <label class="custom-file-label" for="profile_picture">
                                        <div id="profile_picture-filename"></div>
                                    </label>
                                </div>

                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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

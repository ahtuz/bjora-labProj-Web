@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-outline-secondary ml-5 mb-3"><a href="{{route('add_user')}}" class="text-dark" style="text-decoration:none;">Add New User</a></button>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="d-flex justify-content-between">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Profile Picture</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row" class="align-middle">{{ $user->id }}</th>
                                <td class="align-middle text-center">
                                <img src="{{ asset('storage/profile_pictures/'.$user->profile_picture) }}" alt="No Image" srcset="" class="rounded-circle" style="width:60px; height:60px;">
                                </td>
                                <td class="align-middle">{{ $user->username }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->role }}</td>
                                <td class="align-middle">{{ $user->gender }}</td>
                                <td class="align-middle">{{ $user->address }}</td>
                                <td class="align-middle">{{ $user->birthday }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('show_user', $user->id) }}" class="d-block badge badge-pill badge-secondary mb-2">View</a>
                                    <a href="{{ route('show_user', $user->id) }}" class="d-block badge badge-pill badge-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

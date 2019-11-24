@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary" onclick="window.location.href = '{{route('addUser')}}'">
                Add User
            </button>
            <div class="users-table">
                <table id="users">
                    <tr>
                        <th>*</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Profile Picture</th>
                        <th>DOB</th>
                        <th>Action</th>
                    </tr>
                    {{--<!-- @foreach($products as $p)
                    <tr>
                        <td><img src="{{asset('storage/images/'.$p -> product_image)}}" alt="No Image"/></th>
                        <td>//{{$p -> product_name}}</th>
                        <td>{{$p -> product_price}}</th>
                        <td>
                            <a href="{{route('delete_products', $p->id)}}">Edit</a>
                            <a href="{{route('update_products', $p->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach -->--}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

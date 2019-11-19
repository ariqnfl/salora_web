@extends("layouts.global")

@section("title") Users list @endsection

@section("content")
    <h1>User List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Email</b></th>
            <th><b>Role</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

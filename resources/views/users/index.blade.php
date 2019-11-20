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
            <th><b>Action</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a
                        {{--                                {{route('lapangans.edit', [$lapangans->id])}}--}}
                        href=""
                        class="btn btn-info btn-sm"
                    > Edit </a>
                    <input
                        type="submit"
                        value="Delete"
                        class="btn btn-danger btn-sm">

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

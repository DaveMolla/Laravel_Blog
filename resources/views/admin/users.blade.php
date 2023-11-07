@extends('layouts.app')

@section('content')
<br>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>All Registered Users</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered At</th>
                        <th>Is Admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at_formatted }}</td>
                            <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                            {{-- <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection

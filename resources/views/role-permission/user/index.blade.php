@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            @if (auth()->user()->hasRole('super-admin'))
                <div class="container mt-5">
                    <a href="{{ url('roles') }}" class="btn btn-primary mx-1">Roles</a>
                    <a href="{{ url('permissions') }}" class="btn btn-info mx-1">Permissions</a>
                    <a href="{{ url('users') }}" class="btn btn-warning mx-1">Users</a>
                </div>
            @endif

            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <div class="card mt-3">
                            <div class="card-header">
                                <h4>Users
                                    @can('create user')
                                        <a href="{{ url('users/create') }}" class="btn btn-primary float-end">Add User</a>
                                    @endcan
                                </h4>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                            @if (auth()->user()->hasRole('super-admin'))
                                            <th>Roles</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if (auth()->user()->hasRole('super-admin') || auth()->user()->id == $user->id)
                                                        @can('update user')
                                                            <a href="{{ route('users.edit', $user) }}"
                                                                class="btn btn-success">Edit</a>
                                                        @endcan
                                                    @endif

                                                    @can('delete user')
                                                        <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                            class="btn btn-danger mx-2">Delete</a>
                                                    @endcan
                                                </td>
                                                @if (auth()->user()->hasRole('super-admin'))
                                                    <td>
                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $rolename)
                                                                <label
                                                                    class="badge bg-primary mx-1">{{ $rolename }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

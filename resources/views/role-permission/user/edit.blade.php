@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        @if ($errors->any())
                            <ul class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4>Edit User
                                    <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('users/' . $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="" style="">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" readonly value="{{ $user->email }}"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Age</label>
                                        <input type="number" name="age" value="{{ $user->age }}"
                                            class="form-control" />
                                        @error('age')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Sex</label>
                                        <input type="text" name="sex" value="{{ $user->sex }}"
                                            class="form-control" />
                                        @error('sex')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Location</label>
                                        <input type="text" name="location" value="{{ $user->location }}"
                                            class="form-control" />
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phonenumber" value="{{ $user->phonenumber }}"
                                            class="form-control" />
                                        @error('phonenumber')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <input type="text" name="image" value="{{ $user->image }}"
                                            class="form-control" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Country</label>
                                        <input type="text" name="country" value="{{ $user->country }}"
                                            class="form-control" />
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (auth()->user()->hasRole('super-admin'))
                                        <div class="mb-3">
                                            <label for="">Roles</label>
                                            <select name="roles[]" class="form-control" multiple>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role }}"
                                                        {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                                        {{ $role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('roles')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @else
                                        <input type="hidden" name="roles[]"
                                            value="{{ $user->roles->pluck('name')->implode(',') }}" />
                                    @endif
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

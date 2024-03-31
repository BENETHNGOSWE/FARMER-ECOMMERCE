@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">View Pembejeo</h3>
                    </div>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembejeos as $pembejeo)
                        <tr>
                            <td> {{ $loop->iteration}}</td>
                            <td>{{ $pembejeo->pembejeo_jina }}</td>
                            <td>{{ $pembejeo->pembejeo_maelezo }}</td>
                            <td>{{ $pembejeo->pembejeo_bei }}</td>
                            <td>
                                <img src="{{ asset('images/' . $pembejeo->pembejeo_picha) }}" alt=""
                                    style="max-width: 100px; height: auto;">
                            </td>
                            <td>
                                <a href="{{ route('pembejeos.edit', $pembejeo) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pembejeos.delete', $pembejeo) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- </div> --}}
        </div>
    </div>
@endsection

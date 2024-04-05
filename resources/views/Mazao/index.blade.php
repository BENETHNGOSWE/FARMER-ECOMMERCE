@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">View Mazao</h3>
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
                    @foreach ($mazaos as $mazao)
                        <tr>
                            <td> {{ $loop->iteration}}</td>
                            <td>{{ $mazao->mazao_jina }}</td>
                            <td>{{ $mazao->mazao_maelezo }}</td>
                            <td>{{ $mazao->mazao_bei }}</td>
                            <td>
                                <img src="{{ asset('images/' . $mazao->mazao_picha) }}" alt=""
                                    style="max-width: 100px; height: auto;">
                            </td>
                            <td>
                                <a href="{{ route('mazaos.edit', $mazao) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('mazaos.delete', $mazao) }}" method="POST" class="d-inline"
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

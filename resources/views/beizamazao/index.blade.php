<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">View Bei za Mazao</h3>
                    </div>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Kundi la Zao</th>
                        <th>Bei ya kuanzia</th>
                        <th>Bei ya Juu</th>
                        @if (auth()->user()->hasRole('super-admin'))
                            <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beizamazaos as $beizamazao)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $beizamazao->name }}</td>
                            <td>{{ $beizamazao->makundiyamazao->jinalakundi }}</td>
                            <td>Tsh.{{ $beizamazao->min_price }}</td>
                            <td>Tsh.{{ $beizamazao->max_price }}</td>
                            @if (auth()->user()->hasRole('super-admin'))
                                <td>
                                    <a href="{{ route('beizamazaos.edit', $beizamazao) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('beizamazaos.delete', $beizamazao) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- </div> --}}
        </div>
    </div>
@endsection

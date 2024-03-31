@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Bei za Mazao</div>

                    <div class="card-body">
                        <form method="POST" action="/beizamazao" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="makundiyamazao_id" class="form-label">Kundi la mazao</label>
                                <select name="makundiyamazao_id" id="makundiyamazao_id" class="form-select" required>
                                    <option value="">Chagua Kundi</option>
                                    @foreach ($makundiyamazaos as $id => $jinalakundi)
                                    <option value="{{ $id }}">{{ $jinalakundi }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="name">Mazao Jina</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="min_price">Bei ya Kianzio</label>
                                <input type="number" name="min_price" id="min_price" class="form-control" rows="3" required></input>
                            </div>

                            <div class="form-group">
                                <label for="max_price">Bei ya Juu</label>
                                <input type="number" name="max_price" id="max_price" class="form-control" rows="3" required></input>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Mazao</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

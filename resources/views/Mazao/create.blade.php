@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Mazao</div>

                    <div class="card-body">
                        <form method="POST" action="/mazao" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="mazao_jina">Mazao Jina</label>
                                <input type="text" name="mazao_jina" id="mazao_jina" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="mazao_maelezo">Maelezo</label>
                                <textarea name="mazao_maelezo" id="mazao_maelezo" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="mazao_bei">Bei</label>
                                <input type="number" name="mazao_bei" id="mazao_bei" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="mazao_picha" class="col-md-12 p-0">Product mazao_picha</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <img src="" alt="" class="img-product" id="file-preview" width="100em" height="92em" />
                                    <input type="file" id="mazao_picha" name="mazao_picha" accept="image/*"
                                        onchange="showFile(event)">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Mazao</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        function showFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('file-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection

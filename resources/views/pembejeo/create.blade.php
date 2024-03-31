@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New pembejeo</div>

                    <div class="card-body">
                        <form method="POST" action="/pembejeo" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="pembejeo_jina">Pembejeo Jina</label>
                                <input type="text" name="pembejeo_jina" id="pembejeo_jina" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="pembejeo_maelezo">Pembejeo Maelezo</label>
                                <textarea name="pembejeo_maelezo" id="pembejeo_maelezo" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="pembejeo_bei">Bei</label>
                                <input type="number" name="pembejeo_bei" id="pembejeo_bei" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="pembejeo_picha" class="col-md-12 p-0">Pembejeo Picha</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <img src="" alt="" class="img-product" id="file-preview" width="100em"
                                        height="92em" />
                                    <input type="file" id="pembejeo_picha" name="pembejeo_picha" accept="image/*"
                                        onchange="showFile(event)">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Pembejeo</button>
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

@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Update Company pembejeo</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form action={{ route('pembejeos.update', $pembejeo)}} method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4 ">
                                <label class="col-md-12 p-0">pembejeo Jina</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="pembejeo_jina" value="{{ old('pembejeo_jina', $pembejeo->pembejeo_jina) }}"
                                        class="form-control p-0 border-0">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Pembejeo Maelekezo</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="description" name="pembejeo_maelezo"   value="{{ old('pembejeo_maelezo', $pembejeo->pembejeo_maelezo) }}"
                                        class="form-control p-0 border-0" id="example-email">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">pembejeo Bei</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" name="pembejeo_bei"   value="{{ old('pembejeo_bei', $pembejeo->pembejeo_bei) }}"
                                        class="form-control p-0 border-0" id="example-email">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="image" class="col-md-12 p-0">Pembejeo Image</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <img src="{{ asset('images/'.$pembejeo->pembejeo_picha) }}" alt="Current Image" class="img-pembejeo" id="file-preview" width="100em" height="92em"/>
                                    <input type="file" id="pembejeo_picha" name="pembejeo_picha" accept="image/*" onchange="showFile(event)">
                                </div>
                            </div>
                            

                            

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
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

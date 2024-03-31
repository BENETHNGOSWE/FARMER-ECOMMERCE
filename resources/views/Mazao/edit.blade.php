@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Update Company mazao</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form action={{ route('mazaos.update', $mazao)}} method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4 ">
                                <label class="col-md-12 p-0">Mazao Jina</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="mazao_jina" value="{{ old('mazao_jina', $mazao->mazao_jina) }}"
                                        class="form-control p-0 border-0">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Mazao Maelekezo</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="description" name="mazao_maelezo"   value="{{ old('mazao_maelezo', $mazao->mazao_maelezo) }}"
                                        class="form-control p-0 border-0" id="example-email">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Mazao Bei</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="description" name="mazao_bei"   value="{{ old('mazao_bei', $mazao->mazao_bei) }}"
                                        class="form-control p-0 border-0" id="example-email">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="image" class="col-md-12 p-0">Mazao Image</label>
                                <div class="col-md-12 border-bottom p-0">
                                    {{-- <input type="file" name="image" id="image" class="form-control p-0 border-0"> --}}
                                    <img src="{{ asset('public/images'.$mazao->mazao_picha) }}" alt="Current Image" class="img-mazao" id="file-preview" />
                                    <input type="file" id="mazao_picha" name="mazao_picha" accept="image/*" onchange="showFile(event)">
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

<!-- resources/views/mazaos/create.blade.php -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Mazao</div>

                <div class="card-body">
                    <form method="POST" action="/mazao" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="mazao_jina">Jina</label>
                            <input type="text" name="mazao_jina" id="mazao_jina" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="mazao_maelezo">Maelezo</label>
                            <textarea name="mazao_maelezo" id="mazao_maelezo" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="mazao_bei">Bei</label>
                            <input type="text" name="mazao_bei" id="mazao_bei" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="mazao_picha">Picha</label>
                            <input type="file" name="mazao_picha" id="mazao_picha" class="form-control-file" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Mazao</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


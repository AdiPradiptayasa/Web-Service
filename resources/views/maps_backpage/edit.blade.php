<x-backpages>
    <div class="card bg-secondary text-white">
        <div class="card-header">
            <h3 class="mb-0">Edit Lokasi Bengkel</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('maps_backpage.update', $mapsBackpage->id_bengkel) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="id_bengkel" class="form-label">ID Bengkel</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="id_bengkel" name="id_bengkel" value="{{ $mapsBackpage->id_bengkel }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="koordinatX" class="form-label">Kordinat X</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="koordinatX" name="koordinatX" value="{{ $mapsBackpage->koordinatX }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="koordinatY" class="form-label">Kordinat Y</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="koordinatY" name="koordinatY" value="{{ $mapsBackpage->koordinatY }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('maps_backpage.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-backpages>

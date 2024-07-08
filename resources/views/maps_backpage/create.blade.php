<x-backpages>
    <div class="card bg-secondary text-white">
        <div class="card-header">
            <h3 class="mb-0">Tambah Lokasi Bengkel</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('maps_backpage.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="id_bengkel" class="form-label">ID Bengkel</label>
                            </div>
                            <div class="col-md-8">
                            <select class="form-select" id="id_bengkel" name="id_bengkel">
                                @foreach($bengkel as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_bengkel}}</option>
                                @endforeach
                            </select>
                                @error('id_bengkel')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="koordinatX" class="form-label ">Kordinat X</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="koordinatX" name="koordinatX" placeholder="Masukkan Koordinat X" required>                    
                                @error('koordinatX')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="koordinatY" class="form-label">Kordinat Y</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="koordinatY" name="koordinatY" placeholder="Masukkan Koordinat Y" required>                 
                                @error('koordinatY')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-backpages>

<x-backpages>
    <div class="card bg-secondary text-white">
        <div class="card-header">
            <h3 class="mb-0">Create Data</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backpages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_bengkel" class="form-label">Nama Bengkel</label>
                            <input type="text" class="form-control" id="nama_bengkel" name="nama_bengkel" placeholder="Masukkan Nama Bengkel">
                            @error('nama_bengkel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"  placeholder="Masukkan Deskripsi"></textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <textarea class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori"></textarea>
                            @error('kategori')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            @error('foto')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <textarea class="form-control" id="lokasi" name="lokasi"  placeholder="Masukkan Lokasi Bengkel"></textarea>
                            @error('lokasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jam_buka" class="form-label">Jam Buka</label>
                            <textarea class="form-control" id="jam_buka" name="jam_buka" placeholder="Masukkan Jam Buka Bengkel"></textarea>
                            @error('jam_buka')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jam_tutup" class="form-label">Jam Tutup</label>
                            <textarea class="form-control" id="jam_tutup" name="jam_tutup" placeholder="Masukkan Jam Tutup Bengkel"></textarea>
                            @error('jam_tutup')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-backpages>

<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            theme: 'dark'
        })
        .then(editor => {
            editor.ui.getEditableElement().parentElement.insertBefore(
                editor.ui.view.toolbar.element,
                editor.ui.getEditableElement()
            );
        })
        .catch(error => {
            console.error(error);
        });
</script>

<x-template judul="Hapus Data Siswa">
    <h2 class="mt-4 mb-4">Hapus Siswa</h2>
    <form method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="nisn" class="form-label">Nisn</label>
            <input type="number" id="nisn" name="nisn" class="form-control" aria-describedby="nisnHelp" value="{{ $siswa['nisn'] ?? "" }}" disabled>
            <small id="nisnHelp" class="text-muted">
              
            </small>
          </div>
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" aria-describedby="namaHelp" value="{{ $siswa['nama'] ?? "" }}" disabled>
            <small id="namaHelp" class="text-zmuted">
              
            </small>
          </div>
        <div class="form-group mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" aria-describedby="alamatHelp" value="{{ $siswa['alamat'] ?? "" }}" disabled>
            <small id="alamatHelp" class="text-muted">
              
            </small>
          </div>
        <div class="form-group mb-4">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" id="kelas" name="kelas" class="form-control" aria-describedby="kelasHelp" value="{{ $siswa['kelas'] ?? "" }}" disabled>
            <small id="kelasHelp" class="text-muted">
              
            </small>
          </div>
          <div class="form-group">
            <input type="hidden" name="nisn" value="{{ $siswa['nisn'] ?? "" }}">
            <button type="submit" class="btn btn-primary me-2">Hapus</button>
            <a href="{{ url('siswa') }}" class="btn btn-secondary">Kembali</a>
          </div>
    </form>
</x-template>
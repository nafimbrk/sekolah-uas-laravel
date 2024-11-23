<x-template judul="Tambah Data Siswa">
    <h2 class="mt-4 mb-4">Tambah Siswa Baru</h2>
    <form method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="nisn" class="form-label">Nisn</label>
            <input type="number" id="nisn" name="nisn" class="form-control" aria-describedby="nisnHelp" placeholder="Masukkan nisn" required maxlength="10" value="{{ session('nisn') ?? old('nisn') }}">
            <small id="nimHelp" class="text-muted">
              @error('nisn')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
          </div>
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" aria-describedby="namaHelp" placeholder="Masukkan nama" required minlength="3" maxlength="50" value="{{ session('nama') ?? old('nama') }}">
            <small id="namaHelp" class="text-zmuted">
              @error('nama')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
          </div>
        <div class="form-group mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" aria-describedby="alamatHelp" placeholder="Masukkan alamat" maxlength="100" value="{{ session('alamat') ?? old('alamat') }}">
            <small id="alamatHelp" class="text-muted">
              @error('alamat')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
          </div>
        <div class="form-group mb-4">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="number" id="kelas" name="kelas" class="form-control" aria-describedby="kelasHelp" placeholder="Masukkan kelas" maxlength="12" value="{{ session('kelas') ?? old('kelas') }}">
            <small id="kelasHelp" class="text-muted">
              @error('kelas')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary me-2">Tambah</button>
            <a href="{{ url('siswa') }}" class="btn btn-secondary">Kembali</a>
          </div>
    </form>
</x-template>
<x-template judul="Data Siswa">
  <div class="d-flex justify-content-between align-items-center mt-4 mb-4">

      <h2>Data Siswa</h2>
      <a href="{{ url('siswa/tambah') }}">
        <button class="btn btn-primary">Tambah Siswa</button>
      </a>
  </div>
    @if (session('pesan'))
          <div class="alert alert-success">
            {{ session('pesan') }}
          </div>
      @endif
      @if (session('gagal'))
          <div class="alert alert-danger">
            {{ session('gagal') }}
          </div>
      @endif
      <table class="table table-bordered border-dark">
      <thead class="table-dark">
    <tr>
      <th>Nisn</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Kelas</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($siswa as $sw)
      <tr>
      <td>{{ $sw['nisn'] }}</td>
      <td>{{ $sw['nama'] }}</td>
      <td>{{ $sw['alamat'] }}</td>
      <td>{{ $sw['kelas'] }}</td>
      <td>
        <a href="{{ url('siswa/update/'.$sw->nisn) }}" class="me-1">
            <button class="btn btn-warning">Edit</button>
        </a>
        <a href="{{ url('siswa/hapus/'.$sw->nisn) }}">
            <button class="btn btn-danger">Hapus</button>
        </a>
    </td>
      </tr>
      @endforeach
    </tbody>
      </table>
  </x-template>
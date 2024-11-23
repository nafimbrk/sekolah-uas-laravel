<x-template judul="data spp">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h3>Daftar SPP</h3>
        <a href="{{ route('spp.create') }}" class="btn btn-primary">Tambah SPP</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered border-dark">
        <thead class="table-dark">
            <tr>
                <th>Nama Siswa</th>
                <th>Nominal</th>
                <th>Batas Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spp as $item)
                <tr>
                    <td>{{ $item->siswa->nama }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>{{ $item->batas_waktu }}</td>
                    <td>
                        <a href="{{ route('spp.edit', $item->id) }}" class="btn btn-warning me-1">Edit</a>
                        <form action="{{ route('spp.destroy', $item->id) }}" method="POST" style="display:inline;" onclick="return confirm('yakin ingin manghapus data?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-template>

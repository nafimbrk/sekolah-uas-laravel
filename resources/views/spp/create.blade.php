<x-template judul="tambah spp">
    <h3 class="mt-4 mb-4">Tambah SPP untuk Siswa</h3>
    <form action="{{ route('spp.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="siswa_id" class="form-label">Siswa</label>
            <select name="siswa_id" id="siswa_id" required class="form-control">
                @foreach ($siswa as $item)
                    <option value="{{ $item->id }}">-- {{ $item->nama }} --</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="nominal" class="form-label">Nominal SPP</label>
            <input type="number" name="nominal" id="nominal" required class="form-control" placeholder="Masukkan nominal">
        </div>
        <div class="form-group mb-4">
            <label for="batas_waktu" class="form-label">Batas Waktu Pembayaran</label>
            <input type="date" name="batas_waktu" id="batas_waktu" required class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary me-2">Tambah</button>
            <a href="{{ url('spp') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</x-template>

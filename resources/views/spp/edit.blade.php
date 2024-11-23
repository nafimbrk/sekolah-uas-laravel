<x-template judul="edit spp">
    
    <h3 class="mt-4 mb-4">Edit SPP</h3>
    <form action="{{ route('spp.update', $spp->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="siswa_id" class="form-label">Siswa</label>
            <select name="siswa_id" id="siswa_id" required class="form-control">
                @foreach($siswa as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $spp->siswa_id ? 'selected' : '' }}>-- {{ $item->nama }} --</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="nominal" class="form-label">Nominal SPP</label>
            <input type="number" name="nominal" id="nominal" value="{{ $spp->nominal }}" required class="form-control">
        </div>
        <div class="form-group mb-4">
            <label for="batas_waktu" class="form-label">Batas Waktu Pembayaran</label>
            <input type="date" name="batas_waktu" id="batas_waktu" value="{{ $spp->batas_waktu }}" required class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary me-2">Edit</button>
            <a href="{{ url('spp') }}" class="btn btn-secondary">Kembali</a>
        </div>
            </form>

</x-template>
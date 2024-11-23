<x-template judul="Pembayaran SPP">
    <h3 class="mt-4 mb-4">Pembayaran SPP</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered border-dark">
        <thead class="table-dark">
            <tr>
                <th>Nama Siswa</th>
                <th>Nominal SPP</th>
                <th>Batas Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
                @foreach($siswa->spp as $spp)
                <tr>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ number_format($spp->nominal, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($spp->batas_waktu)->format('d M Y') }}</td>
                    <td>
                        @if(!$spp->is_paid)
                            <form action="{{ route('pembayaran.bayar', $spp->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="jumlah" value="{{ $spp->nominal }}">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </form>
                        @else
                            <span class="badge bg-success">Sudah Dibayar</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</x-template>

<x-template judul="History Pembayaran SPP">
    <h3 class="mt-4 mb-4">History Pembayaran SPP</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered border-dark">
        <thead class="table-dark">
            <tr>
                <th>Nama Siswa</th>
                <th>Nominal Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Kode Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $p)
            <tr>
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ number_format($p->jumlah, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_pembayaran)->format('d M Y') }}</td>
                <td>{{ $p->kode_bukti }}</td>
                <td>
                    <a href="{{ route('pembayaran.cetak', $p->id) }}" class="btn btn-primary">Cetak Bukti</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-template>

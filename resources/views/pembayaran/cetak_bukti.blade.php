<x-template judul="Cetak Bukti Pembayaran">
    <div class="container mt-5" style="border: 2px solid #000; padding: 30px; width: 80%; margin: auto;">
        <div class="text-center mb-4">
            <h4 style="font-weight: bold; text-transform: uppercase;">Bukti Pembayaran SPP</h4>
        </div>
        <hr style="border-top: 2px solid #000; margin: 20px 0;">

        <div class="row">
            <div class="col-6">
                <p>NISN: {{ $pembayaran->siswa->nisn }}</p>
                <p>Nama Siswa: {{ $pembayaran->siswa->nama }}</p>
                <p>Kelas: {{ $pembayaran->siswa->kelas }}</p>
            </div>
            <div class="col-6">
                <p>Tanggal Pembayaran: {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d M Y') }}</p>
                <p>Periode SPP: {{ \Carbon\Carbon::parse($pembayaran->spp->batas_waktu)->format('d M Y') }}</p>
                <p>No. Bukti: {{ $pembayaran->kode_bukti }}</p>
            </div>
        </div>

        <hr style="border-top: 2px solid #000; margin: 20px 0;">

        <div class="row">
            <div class="col-6">
                <p>Nominal:</p>
            </div>
            <div class="col-6">
                <p>Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</p>
            </div>
        </div>

        <hr class="garis" style="border-top: 2px solid #000; margin: 20px 0;">

        <div class="row mt-4 no-print">
            <div class="col-12 text-center">
                <button onclick="window.print()" class="btn btn-primary me-1">Cetak Bukti</button>
                <a href="{{ route('pembayaran.history') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
</x-template>

<style>
    @media print {
        .navbar, .btn, .footer, .garis {
            display: none;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            border: none;
            padding: 0;
        }
    }
</style>

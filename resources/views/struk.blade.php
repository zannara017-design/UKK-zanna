<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Parkir #{{ $transaksi->id_parkir }}</title>
    <style>
        body { font-family: monospace; width: 300px; margin: 20px auto; font-size: 14px; }
        h3, p { text-align: center; margin: 4px 0; }
        hr { border: 0; border-top: 1px dashed #000; }
        table { width: 100%; }
        td:last-child { text-align: right; }
        @media print { button { display: none; } }
    </style>
</head>
<body onload="window.print()">
    <h3>STRUK PARKIR</h3>
    <p>No. {{ $transaksi->id_parkir }}</p>
    <hr>
    <table>
        <tr><td>Plat Nomor</td><td>{{ $transaksi->kendaraan->plat_nomor }}</td></tr>
        <tr><td>Jenis</td><td>{{ ucfirst($transaksi->kendaraan->jenis_kendaraan) }}</td></tr>
        <tr><td>Area</td><td>{{ $transaksi->area->nama_area }}</td></tr>
        <tr><td>Masuk</td><td>{{ $transaksi->waktu_masuk->format('d/m/Y H:i') }}</td></tr>
        <tr><td>Keluar</td><td>{{ $transaksi->waktu_keluar?->format('d/m/Y H:i') ?? '-' }}</td></tr>
        <tr><td>Durasi</td><td>{{ $transaksi->durasi_jam }} jam</td></tr>
        <tr><td>Tarif/jam</td><td>Rp {{ number_format($transaksi->tarif->tarif_per_jam, 0, ',', '.') }}</td></tr>
    </table>
    <hr>
    <table>
        <tr><td><strong>TOTAL</strong></td><td><strong>Rp {{ number_format($transaksi->biaya_total, 0, ',', '.') }}</strong></td></tr>
    </table>
    <hr>
    <p>Petugas: {{ $transaksi->petugas->name }}</p>
    <p>Terima kasih</p>
    <button onclick="window.print()">Cetak</button>
</body>
</html>
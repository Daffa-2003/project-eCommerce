<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
</head>

<body>
    <h1>Laporan Transaksi {{ $tgl_awal }} - {{ $tgl_akhir }} </h1>
    {{-- memnuat tabel  --}}
    <table border="1" cellspacing="0" style=" width:100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>code_transaksi</th>
                <th>Total_qty</th>
                <th>Nama_pembeli</th>
                <th>Alamat</th>
                <th>Ekspedisi</th>
                <th>Ongkir</th>
                <th>Total harga</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->code_transaksi }}</td>
                    <td>{{ $item->total_qty }}</td>
                    <td>{{ $item->nama_pembeli }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->ekspedisi }}</td>
                    <td>{{ number_format($item->ongkir) }}</td>
                    <td>{{ number_format($item->total_harga) }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- menampilkna total  --}}
    <h3>Total Transaksi : {{ number_format($totalTransaksi) }}</h3>
</body>

</html>

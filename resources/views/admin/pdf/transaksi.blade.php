<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .total {
            text-align: right;
            padding: 10px;
            margin-right: 10%;
            font-size: 18px;
        }

        .total span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Laporan Transaksi {{ $tgl_awal }} - {{ $tgl_akhir }}</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Code Transaksi</th>
                <th>Total Qty</th>
                <th>Nama Pembeli</th>
                <th>Alamat</th>
                <th>Ekspedisi</th>
                <th>Ongkir</th>
                <th>Total Harga</th>
                <th>Created At</th>
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
    <div class="total">
        Total Transaksi: <span>{{ number_format($totalTransaksi) }}</span>
    </div>
</body>

</html>

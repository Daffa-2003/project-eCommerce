@extends('admin.layout.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="card rounded-full">
            <div class="card-header d-flex justify-content-between">
                <form action="{{ route('reportFilter') }}" method="get">
                    <div class="filter d-flex flex-lg-row mr-auto" style="gap: 10px;">
                        <input type="date" class="form-control" name="tgl_awal">
                        <input type="date" class="form-control" name="tgl_akhir">
                        <button class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover ">
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
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->code_transaksi }}</td>
                                <td>{{ $item->total_qty }}</td>
                                <td>{{ $item->nama_pembeli }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->ekspedisi }}</td>
                                <td>{{ $item->ongkir }}</td>
                                <td>{{ $item->total_harga }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('reportFilter') }}? export=pdf" method="get" class="mt-3">
                    <input type="hidden" name="tgl_awal" value="{{ request('tgl_awal') }}">
                    <input type="hidden" name="tgl_akhir" value="{{ request('tgl_akhir') }}">
                    <input type="hidden" name="export" value="pdf">
                    <button class="btn btn-secondary">Export to PDF</button>
                </form>
            </div>
        </div>
    </section>
@endsection

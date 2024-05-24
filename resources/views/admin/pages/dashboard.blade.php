@extends('admin.layout.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- main content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $product }}</h3>
                            <p>Inventory</p>
                        </div>
                        <div class="icon">
                            <i class="ion fa-solid fa-box-archive"></i>
                        </div>
                        <h4 class="small-box-footer">Total Inventory</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalTransaksi }}</h3>
                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion fa-solid fa-cart-shopping"></i>
                        </div>
                        <h4 class="small-box-footer">Total order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $user }}</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion fa-solid fa-users"></i>
                        </div>
                        <h4 class="small-box-footer">Total karyawan</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($hasil) }}</h3>
                            <p>profit</p>
                        </div>
                        <div class="icon">
                            <i class="ion fa-solid fa-wallet"></i>
                        </div>
                        <h4 class="small-box-footer">Total Profit</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Line Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="lineChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                            <h1>asdas</h1>
                        </canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <script>
        // Pastikan DOM sudah selesai di-load
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen canvas
            var ctx = document.getElementById('lineChart').getContext('2d');

            // Buat grafik baru
            var myChart = new Chart(ctx, {
                type: 'line', // jenis grafik
                data: {
                    labels: @json($month), // label untuk sumbu x
                    datasets: [{
                        label: 'Data', // label untuk dataset ini
                        data: @json($data), // data yang akan ditampilkan
                        backgroundColor: 'rgba(0, 123, 255, 0.5)', // warna background
                        borderColor: 'rgba(0, 123, 255, 1)', // warna border
                        borderWidth: 1 // lebar border
                    }]
                },
                options: {
                    responsive: true, // grafik akan menyesuaikan ukuran saat ukuran window berubah
                    scales: {
                        y: {
                            beginAtZero: true // sumbu y dimulai dari 0
                        }
                    }
                }
            });
        });
    </script>
@endsection

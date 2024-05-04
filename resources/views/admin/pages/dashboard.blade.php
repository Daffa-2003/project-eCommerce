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
                            <h3>{{ $hasil }}</h3>
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

    </section>
@endsection

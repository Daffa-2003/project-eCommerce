@extends('pelanggan.layouts.index')

@section('content')
    @if ($best->isEmpty())
        <div class="container"></div>
    @else
        <div class="mt-5">
            <h4>Best Seller</h4>
        </div>
        <div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
            @foreach ($best as $item)
                <div class="card" style="width: 220px">
                    <div class="card-header m-auto" style="height:100%;width:100%;">
                        <img src="{{ asset('storage/product/' . $item->foto) }}" alt="foto "
                            style="width: 100%;height:200px; object-fit: cover; padding:0;">
                    </div>
                    <div class="card-body">
                        <p class="m-0 text-justify">{{ $item->name }}</p>
                        <p class="m-0"><i class="fa-regular fa-star"> 5+</i></p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                        <p class="m-0" style="font-size: 16px; font-weight:600;">Rp. {{ number_format($item->harga) }}
                        </p>
                        <form action="{{ route('addTocart', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary" style="font-size: 24px" name="id"
                                value="{{ $item->id }}">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{-- new Product --}}
    <div class="mt-5">
        <h4>New Product</h4>
    </div>
    <div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
        @if ($data->isEmpty())
            <h1>Product Belum Tersedia</h1>
        @else
            @foreach ($data as $item)
                <div class="card" style="width: 220px">
                    <div class="card-header m-auto" style="height:100%;width:100%;">
                        <img src="{{ asset('storage/product/' . $item->foto) }}" alt="foto "
                            style="width: 100%;height:200px; object-fit: cover; padding:0;">
                    </div>
                    <div class="card-body">
                        <p class="m-0 text-justify">{{ $item->name }}</p>
                        <p class="m-0"><i class="fa-regular fa-star"> 5+</i></p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                        <p class="m-0" style="font-size: 16px; font-weight:600;">Rp. {{ number_format($item->harga) }}
                        </p>
                        <form action="{{ route('addTocart', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary" style="font-size: 24px" name="id"
                                value="{{ $item->id }}">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
    </div>
    <div class="pagination d-flex flex-row justify-content-between mt-3">
        <div class="showData">
            <span>Data ditampilkan {{ $data->count() }} dari {{ $data->total() }} </span>
        </div>
        <div>
            {{ $data->links() }}
        </div>
    </div>
    @endif
@endsection

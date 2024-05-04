@extends('pelanggan.layouts.index')

@section('content')
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Kategori
                </div>
                <div class="card-body">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    pria
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body ">
                                    <div class="d-flex flex-column gap-3">
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Baju Pria
                                        </a>
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Celana Pria
                                        </a>
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Aksesoris Pria
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Wanita
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body ">
                                    <div class="d-flex flex-column gap-3">
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Baju Wanita
                                        </a>
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Celana Wanita
                                        </a>
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Aksesoris Wanita
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Anak
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body ">
                                    <div class="d-flex flex-column gap-3">
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Baju Anak
                                        </a>
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Celana Anak
                                        </a>
                                        <a href="" class="page-link">
                                            <i class="fas fa-plus"></i> Aksesoris Anak
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 d-flex flex-wrap gap-4 mb-4">
            @if ($data->isEmpty())
                <h1 class="">Product Belum Tersedia</h1>
            @else
                @foreach ($data as $item    )
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
                            <p class="m-0" style="font-size: 16px; font-weight:600;">Rp.
                                {{ number_format($item->harga) }}
                            </p>
                            <button class="btn btn-outline-primary" style="font-size: 24px">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
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
    </div>
@endsection

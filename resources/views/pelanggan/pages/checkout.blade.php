@extends('pelanggan.layouts.index')

@section('content')
    <form action="{{ route('checkout.bayar') }}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body ekspedisi">
                        <h3>Masukan Alamat Penerima</h3>
                        <div class="row mb-3">
                            <label for="nama_penerima" class="col-form-label col-sm-3">Nama Penerima</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_penerima" name="namaPenerima"
                                    placeholder="Masukan Nama Penerima" autofocus required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_penerima" class="col-form-label col-sm-3">Alamat Penerima</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat_penerima" name="alamatPenerima"
                                    placeholder="Masukan Alamat Penerima" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tlp" class="col-form-label col-sm-3">No.tlp Penerima</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tlp" name="tlp"
                                    placeholder="Masukan No tlp Penerima" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ekspedisi" class="col-form-label col-sm-3">Ekspedisi</label>
                            <div class="col-sm-9">
                                <select name="ekspedisi" class="form-control eksp" id="ekspedisi">
                                    <option value="">-- Pilih Ekspedisi --</option>
                                    <option value="jnt">J&T Ekspress</option>
                                    <option value="jne">JNE Ekspress</option>
                                    <option value="sicepat">Sicepat Ekspress</option>
                                    <option value="ninja">Ninja Ekspress</option>
                                    <option value="gratis">None</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Total Belanja</h3>
                    </div>
                    <div class="card-body pembayaran">
                        <h3 class="mb-3">{{ $codeTransaksi }}</h3>
                        <input type="hidden" name="kodeTransaksi" value="{{ $codeTransaksi }}">
                        <div class="row mb-3">
                            <label for="qty" class="col-form-label col-sm-6">Total Quantity</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control qty" id="qty" name="qty"
                                    value="{{ $qtyBarang }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jumlahBarang" class="col-form-label col-sm-6">Jumlah Barang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control jumlahBarang" id="jumlahBarang"
                                    name="jumlahBarang" value="{{ $jumlahBarng }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="totalBelanja" class="col-form-label col-sm-6">Total Harga</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control totalBelanja" id="totalBelanja"
                                    name="totalBelanja" value="{{ $detailBelanja }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discon" class="col-form-label col-sm-6">Discount</label>
                            <div class="col-sm-6">
                                @if (Auth::user())
                                    <input type="number" class="form-control discount" id="discount" name="discount"
                                        value="0.1" readonly>
                                @else
                                    <input type="number" class="form-control discount" id="discount" name="discount"
                                        value="0" readonly>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ongkir" class="col-form-label col-sm-6">Ongkir</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control ongkir" id="ongkir" name="ongkir"
                                    value="0" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="total_bayar" class="col-form-label col-sm-6">Total Bayar</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control dibayarkan" id="total_bayar" name="totalBayar"
                                    value="0" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bayar" class="col-form-label col-sm-6">Bayar</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control " id="bayar" name="bayar"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kembalian" class="col-form-label col-sm-6">Kembalian</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="kembalian" name="kembalian"
                                    value="" readonly>
                            </div>
                        </div>
                        {{-- <input type="text" readonly value="{{ $qtyBarang }}">
                        <input type="text" readonly value="{{ $jumlahBarng }}"> --}}
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-print"></i> print struck
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

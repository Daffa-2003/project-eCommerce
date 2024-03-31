@extends('pelanggan.layouts.index')

@section('content')
    <div class="row mt-3">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h3>Masukkan Alamat</h3>
                    <div class="row mb-3">
                        <label for="nama_penerima" class="col-form-label col-sm-3">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_penerima" name="namaPenerima" placeholder="Masukkan Nama Penerima">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_penerima" class="col-form-label col-sm-3">Alamat Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat_penerima" name="alamatPenerima" placeholder="Masukkan Alamat Penerima">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomer_tlp" class="col-form-label col-sm-3">No.tlp Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomer_tlp" name="nomertlp" placeholder="Masukkan No.tlp Penerima">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ekspedisi" class="col-form-label col-sm-3">Layanan</label>
                        <div class="col-sm-9">
                            <select name="ekspedisi" class="form-control" id="ekspedisi">
                                <option value="">-- Pilih Ekspedisi --</option>
                                <option value="jnt">J&T Ekspress</option>
                                <option value="jne">JNE Ekspress</option>
                                <option value="sicepat">Sicepat Ekspress</option>
                                <option value="ninja"> Ninja Ekspress</option>
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
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="total_harga" class="col-form-label col-sm-6">Total Harga</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="total_harga" name="totalHarga" value="500000" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discon" class="col-form-label col-sm-6">Discon</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="discon" name="discon" value="5000" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ongkir" class="col-form-label col-sm-6">Ongkir</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="ongkir" name="ongkir" value="20000" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="total_bayar" class="col-form-label col-sm-6">Total Bayar</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="total_bayar" name="totalBayar" value="" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bayar" class="col-form-label col-sm-6">Bayar</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="bayar" name="bayar" value="" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kembalian" class="col-form-label col-sm-6">Kembalian</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="kembalian" name="kembalian" value="" readonly>
                            </div>
                        </div>
                        <button class="btn btn-success w-100">
                            <i class="fas fa-print"></i> print struck
                        </button>
                    </div>
            </div>
        </div>
    </div>
@endsection
<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('addData')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="SKU" class="col-sm-4 col-form-label">SKU</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext" id="SKU" value="{{$sku}}" name="sku">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaProduct" class="col-sm-4 col-form-label">Nama Product</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="namaProduct" name="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="type" class="col-sm-4 col-form-label">Type Product</label>
                    <div class="col-sm-8">
                      <select type="text" class="form-control" id="type" name="type">
                        <option value="">Pilih Type</option>
                        <option value="celana">Celana</option>
                        <option value="baju">Baju</option>
                        <option value="aksesoris">Aksesoris</option>
                      </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kategori" class="col-sm-4 col-form-label">Kategori Product</label>
                    <div class="col-sm-8">
                      <select type="text" class="form-control" id="kategori" name="kategori">
                        <option value="">Pilih Kategori</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                        <option value="anak">Anak</option>
                      </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-4 col-form-label">Harga Product</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="quantity" class="col-sm-4 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="foto" class="col-sm-4 col-form-label">Foto Product</label>
                  <div class="col-sm-8">
                    <img src="" class="preview" style="width: 100px;">
                      <div class="custom-file">
                        <input type="hidden" name="foto">
                        <input type="file" class="custom-file-input" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg()">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>  
      </div>
    </div>
  </div>

  
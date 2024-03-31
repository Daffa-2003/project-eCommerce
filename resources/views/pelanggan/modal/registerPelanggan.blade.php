  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="Masukkan nama anda" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="" placeholder="Masukkan email anda" required>
                </div>
            </div>
            <div class="mb-3 row">
              <label for="password" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Masukkan password anda" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="noHp" class="col-sm-3 col-form-label">Phone Number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="noHp" name="noHp" value="" placeholder="Masukkan noHp anda" required>
              </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="Masukkan alamat anda" required>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="tglLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="" required>
                </div>
            </div>
            <button type="button" class="btn btn-success col-sm-12">Login</button>
            <p class="p-2 m-auto text-center" style="font-size: 16px">Jika Belum ada akun Register terlebih dahulu ..!</p>
            <button type="button" class="btn btn-danger col-sm-12">Close</button>
        </div>
      </div>
    </div>
  </div>
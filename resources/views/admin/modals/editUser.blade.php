<!-- Modal -->
<div class="modal fade" id="editModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('updateUser', $data->id)}}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext" id="nik" value="{{$data->nik}}" name="nik">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-4 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="nama" value="{{$data->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label">Email Karyawan</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-4 col-form-label">Password Karyawan</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="password" name="password" value="{{password_needs_rehash($data->password,'PASSWORD_BCRYPT')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat Karyawan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tglLahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="{{$data->tglLahir}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tlp" class="col-sm-4 col-form-label">telphone Karyawan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tlp" name="tlp" value="{{$data->tlp}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="role" class="col-sm-4 col-form-label">Jabatan</label>
                    <div class="col-sm-8">
                      <select type="text" class="form-control" id="role" name="role">
                        <option value="">Pilih Role</option>
                        <option value="1" {{$data->role=='1'? 'selected': ''}}>Admin</option>
                        <option value="2" {{$data->role=='2'? 'selected': ''}}>Manager</option>
                      </select>
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="foto" class="col-sm-4 col-form-label">Foto Product</label>
                  <div class="col-sm-8">
                    <img src="{{asset('storage/profil/'. $data->foto)}}" class="preview" style="width: 100px;">
                      <div class="custom-file">
                        <input type="hidden" name="foto"value="{{$data->foto}}">
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

  
  <script>
    function previewImg(){
      const foto = document.querySelector('#inputFoto')
      const preview = document.querySelector('.preview')
      preview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(foto.files[0]);

      oFReader.onload = function(oFREvent){
        preview.src = oFREvent.target.result;
      }
    }
  </script>
@extends('admin.layout.index')

@section('content')
     <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Management</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="card rounded-full">
      <div class="card-header d-flex justify-content-between">
        <div class="filter d-flex flex-lg-row mr-auto" style="gap: 10px;" >
          <input type="date" class="form-control" name="tgl_awal">
          <input type="date" class="form-control" name="tgl_akhir">
          <button class="btn btn-primary">Filter</button>
        </div>
        <input
        class="form-control justify-content-between w-25"
        type="search"
        placeholder="Search..."
      />
      </div>
    </div>
    <div class="card rounded-full">
        <div class="card-header t-2">
          <button class="btn btn-info" id="addUser"><i class="fa-solid fa-plus"></i><span> Tambah Product</span></button>
        </div>
      <div class="card-body">
        <table class="table table-bordered table-hover ">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Join Date</th>
              <th>Nama</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $x)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
                <img src="{{asset('storage/profil/'. $x->foto)}}" alt="foto" width="100px" height="100px">
              </td>
              <td>{{$x->created_at}}</td>
              <td>{{$x->name}}</td>
              <td>
                @if($x->role == 1)
                  <span class="badge badge-primary">Admin</span>
                @else
                  <span class="badge badge-info">Manager</span>
                @endif
              </td>
              <td>
                @if($x->is_active == 1)
                  <span class="badge badge-success">Active</span>
                
                @else
                  <span class="badge badge-danger">Non Active</span>
                @endif
              </td>
              <td>
                <button class="btn btn-warning" id="editUser" data-id="{{$x->id}}"><i class="fa-solid fa-pencil"></i></button>
                <button class="btn btn-danger deleteUser"  data-id="{{$x->id}}"><i class="fa-solid fa-trash"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagination d-flex flex-row justify-content-between mt-3">
          <div class="showData">
            <span>Data ditampilkan {{$data->count()}} dari {{$data->total()}} </span>
          </div>
          <div>
            {{ $data->links() }}
          </div>
        </div>
      </div>
    </div>
    <div class="tampilData" style="display: none;"></div>
    <div class="tampilEditData" style="display: none;"></div>
  </section>

  <script>
     $('#addUser').click(function(e){
      e.preventDefault();
      $.ajax({
        url: "{{route('addModalUser')}}",
        success: function(response){
          $('.tampilData').html(response).show(),
          $('#addModalUser').modal('show');
        }
      })
    })

    $('#editUser').click(function(e){
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        type: 'GET',
        url: "{{route('editModalUser',['id'=> ':id'])}}".replace(":id", id),
        success: function(response){
          $('.tampilEditData').html(response).show(),
          $('#editModalUser').modal('show');
        }
      })
    })

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    
    $('.deleteUser').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nik = $('#nik').val();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });

            Swal.fire({
                title: 'Hapus data ?',
                text: "Kamu yakin untuk menghapus karyawan ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('deleteUser', ['id' => ':id']) }}".replace(':id', id),
                        dataType: "json",
                        headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan notifikasi error jika terjadi kesalahan
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
        });
  </script>

@endsection
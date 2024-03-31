@extends('admin.layout.index')

@section('content')
  <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Poduct</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Poduct</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  {{-- main content --}}
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
          <button class="btn btn-info" id="addData"><i class="fa-solid fa-plus"></i><span> Tambah Product</span></button>
        </div>
      <div class="card-body">
        <table class="table table-bordered table-hover ">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Date In</th>
              <th>SKU</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr class="align-middle">
              <td>{{$loop->iteration}}</td>
              <td>
                <img src="{{asset('storage/product/'. $item->foto)}}" alt="foto" width="100px" height="100px">
              </td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->sku}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->type.' '.$item->kategori}}</td>
              <td>{{$item->harga}}</td>
              <td>{{$item->quantity}}</td>
              <td>
                <input type="hidden" id="sku" value="{{$item->sku}}">
              <button class="btn btn-info editModal" data-id="{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
              <button class="btn btn-danger deleteData" data-id="{{$item->id}}"><i class="fa-solid fa-trash"></i></button>
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
    
    $('#addData').click(function(e){
      e.preventDefault();
      $.ajax({
        url: "{{route('addModal')}}",
        success: function(response){
          $('.tampilData').html(response).show(),
          $('#addModal').modal('show');
        }
      })
    })

    $('.editModal').click(function(e){
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        type: 'GET',
        url: "{{route('editModal', ['id'=> ':id'])}}".replace(':id', id),
        success:function(response){
          $('.tampilEditData').html(response).show(),
          $('#editModal').modal('show');
        }
      })
    })

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    
    $('.deleteData').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var sku = $('#sku').val();
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
                text: "Kamu yakin untuk menghapus SKU " + sku + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('deleteData', ['id' => ':id']) }}".replace(':id', id),
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
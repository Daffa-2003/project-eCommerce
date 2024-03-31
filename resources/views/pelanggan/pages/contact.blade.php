@extends('pelanggan.layouts.index')

@section('content')
    <div class="row mt-4 align-items-center">
        <div class="col-md-6">
            <div class="content-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae recusandae facilis quasi repellat aspernatur beatae? Fugit architecto ipsa animi? Ad explicabo beatae assumenda incidunt ab! Optio quam autem veniam at?
                Debitis, cum. Deleniti praesentium, eius sint maxime quaerat explicabo harum similique in veniam adipisci dolore dolor consectetur libero optio veritatis voluptatem perspiciatis quod ullam vero vitae. Eaque nostrum perferendis repellat.
                Deserunt accusantium perferendis eos mollitia, officiis laborum possimus cum amet reprehenderit, voluptatem vero soluta deleniti animi. Sunt aut cumque omnis hic vitae fugiat animi! A rem velit enim consequatur magnam!
                Tenetur facilis maiores nihil soluta blanditiis quam quos perspiciatis nemo dolor, numquam, vitae libero sequi magnam id esse natus ex commodi, nam consectetur eveniet? Ipsam temporibus dignissimos veniam ab obcaecati.
                Ratione fuga ea, corporis exercitationem ducimus officia eaque libero, dolore soluta animi nesciunt dicta. Praesentium eos ad maxime repudiandae quia ipsam? Quidem sapiente incidunt soluta, facilis voluptatum illo eum dicta?
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{asset('aset/images/gedung.png')}}" alt="" style="width: 100%">
        </div>
    </div>
    <div class="d-flex justify-content-lg-between mt-5">
        <div class="d-flex align-items-center gap-4">
            <i class="fa fa-users fa-2x"></i> 
            <p class="m-0 fs-5">+ 300 pelanggan</p>
        </div>
        <div class="d-flex align-items-center gap-4">
            <i class="fas fa-home fa-2x"></i> 
            <p class="m-0 fs-5">+ 300 seller</p>
        </div>
        <div class="d-flex align-items-center gap-4">
            <i class="fas fa-shirt fa-2x"></i>
            <p class="m-0 fs-5">+ 300 product</p> 
        </div>
    </div>

    <h4 class="text-center mt-md-5 mb-md-2">Contact Us</h4>
    <hr class="mb-3">
    <div class="row mb-md-5">
        <div class="col-md-5">
            <img src="{{asset('aset/images/model.jpg')}}" style="width: 100%; height:60vh; border-radius:10px;" alt="">
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Kritik dan Saran</h4>
                </div>
                <div class="card-body">
                    <p class="p-0 mb-5 text-lg-center">Masukkan Kririk dan Saran anda kepada aplikasi kami ini agar kami dapat memberikan apa yang menjadi kebutuhan anda.</p>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value="" placeholder="Masukkan email anda">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pesan" value="" placeholder="Masukkan pesan anda">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4 w-100">Kirim Pesan Anda</button>
                </div>
            </div>
        </div>
    </div>
@endsection
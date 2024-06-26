<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #344955">
    <div class="container">
        <a class="navbar-brand fs-4" href="/">Toko Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'shop' ? 'active' : '' }}" href="/shop/pria/baju">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'contact' ? 'active' : '' }}" href="/contact">Contact</a>
                </li>
            </ul>
            <div class="d-flex gap-4 align-items-center">
                <a href="/admin" class="btn btn-success">Login</a>
                <div class="notif">
                    <a href="/transaksi" class="fs-5">
                        <i class="fa-solid fa-bag-shopping icon-nav"></i>
                    </a>
                    @if ($keranjang)
                        <div class="circle">{{ $keranjang }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>

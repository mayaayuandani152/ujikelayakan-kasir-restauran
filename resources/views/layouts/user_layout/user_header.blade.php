<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
        <div class="container">
            <h3><i class="fas fa-cart-plus text-success mr-2"></i></h3>
            <a class="navbar-brand font-weight-bold" href="#">ANDANIshop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Reseller<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Hubungi kami<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Bantuan<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="icon">
                     <?php
                    
                //     $pesanan_baru=\App\Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
                //     if(!empty($pesanan_baru)){
                //  $notif=\App\PesananDetail::where('id_pesanan', $pesanan_baru->id)->count();
                //     }
                    
                     ?>
                    
                     
                    <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    <a href=""><i class="fas fa-user mr-3"></i></a>
                    <a href=""><i class="fas fa-store"></i></a>
                                    
                </div>
                
            </div>
            
        </div>
    </nav>


  
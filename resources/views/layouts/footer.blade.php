 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4" style="font-size:26px;">Kelurahan
                        <br><span class="text-white" style="margin-left: 60px; font-size:26px;">Nambangan Kidul</span></h1>
                    <p>Website ini dikembangkan guna memberikan informasi secara meluas terkait Nambangan Kidul </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Alamat</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Merpati No.75, Nambangan Lor, Kec. Manguharjo, Kota Madiun, Jawa Timur 63129</p>
                    <p><i class="fa fa-phone-alt me-3"></i>(0351) 493137</p>
                    <p><i class="fa fa-envelope me-3"></i>kelnambangankidul@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Menu</h5>
                    <a class="btn btn-link" href="/">Beranda</a>
                    <a class="btn btn-link" href="/histories">Profile Kelurahan</a>
                    <a class="btn btn-link" href="/contact">Contact Kelurahan</a>
                    <a class="btn btn-link" href="/beritaterkini">Berita Terkini</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Berita Terkini</h5>
                    <p>Masukkan kata kunci berita yang Anda inginkan.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                    <form action="{{route('reader.cr_berita')}}" method="post" class="search-box">
                            {{csrf_field()}}
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" name="cari" type="search" placeholder="Cari berita">
                        <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Search</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Nambangan Kidul</a>, 2022.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


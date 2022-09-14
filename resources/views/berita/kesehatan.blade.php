@extends('layouts.app')
    <!-- Preloader Start-->
@include('layouts.header')
@extends('layouts.contents')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/madiun.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown" style="width: 1200px; text-align: center; margin-left: -230px;">Selamat Datang di Website Nambangan Kidul</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Melalui website ini segala bentuk informasi akan tersampaikan secara mudah, cepat, dan menjangkau seluruh lapisan masyarakat</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="">
                                    Read More
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/madiun2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Teknologi Mempermudah Kita</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Website ini menjadi media informasi bagi pemerintah kelurahan dan juga masyarakat Nambangan Kidul</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="">
                                    Read More
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Causes Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Sekilas info</div>
                <h1 class="display-6 mb-5">Berita Kesehatan Nambangan Kidul</h1>
            </div>
            <div class="row g-4 justify-content-center">
            @foreach ($kesehatan as $ksh)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Kesehatan</small>
                            </div>
                            <h5 class="mb-3">{{substr($ksh->judul,0,50)}}...</h5>
                            <p>{!!substr($ksh->isi,0,80)!!}...</p>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{asset('foto/'.$ksh->foto)}}" style="height:250px; width:500px;" alt="">
                            <div class="causes-overlay">
                                <a class="btn btn-outline-primary" href="{{route('reader.show_news',$ksh->id)}}">
                                    Read More
                                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
    <!-- Causes End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
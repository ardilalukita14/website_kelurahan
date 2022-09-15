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


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="img/about-3.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Profile</div>
                        <h1 class="display-6 mb-5">Sambutan Kepala Nambangan Kidul</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Assalamualaikum Wr.Wb</p>
                            <p class="text-dark mb-2" style="text-align: justify;">Pertama - tama mari kita panjatkan puji syukur atas limpahan berkah dan karunia yang diberikan oleh Tuhan Yang Maha Esa,
                                sehingga website ini bisa dikembangkan dengan baik dan harapannya website ini kedepannya juga bisa menjadi media informasi yang dapat mempermudah
                                seluruh lapisan masyarakat. 
                            </p>
                            <p class="text-dark mb-2" style="text-align: justify;">Kami juga berharap website ini bisa menjadi wadah transparansi informasi yang mampu menjangkau seluruh lapisan masyarakat, mampu
                                menjadi media bagi masyarakat untuk menyampaikan saran dan kritik. Untuk itu saya himbau kepada seluruh pengguna website ini, agar bisa memanfaatkan
                                kemajuan teknologi ini dengan sebaik-baiknya, agar nilai - niali positif yang kita peroleh juga melimpah ruah. Terima kasih.</p>
                            <p class="text-dark mb-2" style="text-align: justify;">Wassalamualaikum Wr.Wb</p>
                            <span class="text-primary">Rahma Indah Heriastuti, SP</span>
                        </div>
                        <a class="btn btn-primary py-2 px-3 me-3" href="">
                           Read More
                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                        <a class="btn btn-outline-primary py-2 px-3" href="">
                            Contact Us
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Causes Start -->
    <div class="container-xxl bg-light my-5 py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Berita Terkini</div>
                <h1 class="display-6 mb-5">Berita Harian Nambangan Kidul</h1>
            </div>
            <div class="row g-4 justify-content-center">
            @foreach ($latest as $lts)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Latepost</small>
                            </div>
                            <h5 class="mb-3">{{substr($lts->judul,0,50)}}...</h5>
                            <p>{!!substr($lts->isi,0,100)!!}...</p>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{asset('foto/'.$lts->foto)}}" style="height:250px; width:500px;" alt="">
                            <div class="causes-overlay">
                                <a class="btn btn-outline-primary" href="{{route('reader.show_news',$lts->id)}}">
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
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Layanan</div>
                <h1 class="display-6 mb-5">Standar Pelayaan Publik</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon1.png" style="width:100px; height:100px;" alt="">
                        <h4 class="mb-3">Jam Layanan</h4>
                        <p class="mb-4" style="margin-top:55px;">Klik button di bawah untuk melihat detail jam pelayanan.</p>
                        <a class="btn btn-outline-primary px-3" href="/jadwalpelayanan">
                           Read More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon2.png" style="width:100px; height:100px;" alt="">
                        <h4 class="mb-3">Standar dan Produk Layanan</h4>
                        <p class="mb-4" style="margin-top:25px;">Klik button di bawah untuk detail standar dan produk layanan.</p>
                        <a class="btn btn-outline-primary px-3" href="/standarpelayanan">
                           Read More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon3.png" style="width:100px; height:100px;" alt="">
                        <h4 class="mb-3">Format Surat Lainnya</h4>
                        <p class="mb-4" style="margin-top:50px;">Klik button di bawah untuk mengunduh format surat sesuai kebutuhan.</p>
                        <a class="btn btn-outline-primary px-3" href="/filesupload">
                           Read More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Donate Start -->
    <div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="img/carousel-2.jpg">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Contact</div>
                    <h1 class="display-6 text-white mb-5">Terima kasih telah mengunjungi website ini</h1>
                    <p class="text-white-50 mb-0">Untuk informasi lebih, Anda dapat menghubungi kami atau jika ada kritik dan saran silakan mengunjungi halaman <b>contact</b>.</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-white p-5">
                        <form>
                    <div class="position-relative rounded overflow-hidden h-100">
                        <iframe class="position-relative w-100 h-100"
                        src="https://maps.google.com/maps?q=%20Nambangan%20Kidul%20Kec.%20Manguharjo%20Kota%20Madiun%20Jawa%20Timur%20&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="min-height: 250px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Pengumuman</div>
                <h1 class="display-6 mb-5">Himbauan Bagi Pihak Terkait</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($pengumuman as $pgm)
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/logomadiun3.png" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                    <h5 class="mb-1">{{$pgm->judul,0,20}}</h5>
                        <p style="margin-top:25px;">{{$pgm->isi}}</p>
                        <span class="fst-italic" style="font-size: 13px;"><i class="menu-icon fa fa-clock" aria-hidden="true"></i>
                        {{$pgm->tanggal}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    @endsection
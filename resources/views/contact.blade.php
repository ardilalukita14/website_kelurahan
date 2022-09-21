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

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Contact Us</div>
                    <h1 class="display-6 mb-5">Kritik dan Saran Anda sangat berharga untuk kami.</h1>
                    <p class="mb-4">Anda dapat mengirimkan kritik dan saran yang berkaitan dengan website ataupun aktivitas di Nambangan Kidul melalui form di bawah ini. Pesan secara otomatis akan diterima oleh administrator. Mohon untuk tidak mengirimkan pesan yang sama secara berulang</a>.</p>
                    <form class="form-contact contact_form" action="{{route('saran.store')}}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control valid" name="nama" id="nama" type="text" placeholder="Nama Lengkap" required>
                                    <label for="nama">Nama Lengkap</label>

                                    @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control valid" name="email" id="email" type="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                    @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                     <input class="form-control" name="subjek" id="subjek" type="text" placeholder="Subjek" required>
                                    <label for="subjek">Subjek</label>
                                    @error('subjek')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                <!-- <label for="pesan" style="margin-bottom:-100px;">Pesan</label> -->
                                <textarea class="ckeditor form-control valid" name="pesan" id="pesan" style="height: 100px" required></textarea>       
                                @error('pesan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror                 
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-2 px-3 me-3">
                                    Kirim
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <iframe class="position-relative w-100 h-100"
                        src="https://maps.google.com/maps?q=%20Nambangan%20Kidul%20Kec.%20Manguharjo%20Kota%20Madiun%20Jawa%20Timur%20&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
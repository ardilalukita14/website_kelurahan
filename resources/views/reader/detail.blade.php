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
                                    <h1 class="display-4 text-white mb-3 animated slideInDown" style="width: 1200px; text-align: center; margin-left: -230px;">Selamat Datang di Website Kelurahan Nambangan Kidul</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Melalui website ini segala bentuk informasi akan tersampaikan secara mudah, cepat, dan menjangkau seluruh lapisan masyarakat</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="">
                                        Learn More
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
                                        Learn More
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


<hr>
<div class="col-md-12" style="margin-left:30px">
<h1><b>{{$news->judul}}</b></h1>
<p>Penulis : <b>{{$news->author}}</b>, {{$news->tanggal}}</p> <hr>
</div>

<div class="row">
	<div class="col-md-7" style="margin-left:30px">
		<p align="center"><img style="width: 600px;height: 300px;" src="{{asset('foto/'.$news->foto)}}"></p>
        <div class="mb-10;"><p align="justify" style="margin-top: 40px;">{!!$news->isi!!}</p></div>
		<hr><br>
		@if(Session::has('success'))
		<div class="alert alert-info">
			<p>{{Session::get('success')}}</p>
		</div>
		@endif
        <br>
		@foreach($komen as $k)
			<div class="panel panel-info">
				<div class="panel-body">
					<p><b>{{$k->nama}}</b></p>
					<p>{{$k->tanggal}}</p>
					<p>{!!$k->keterangan!!}</p>
					<hr>		
				</div>
			</div>
            <hr><br>
            @endforeach
		
		<p><b>LEAVE A REPLAY</b></p>
		<form action="{{route('reader.komentar',$news->id)}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
                <textarea class="ckeditor form-control valid" name="isi" required="" placeholder="Masukan Komentar" style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;"></textarea>
			</div>
            <br>
			<div class="form-group">
				<input type="text" name="nama" required=""  class="form-control" placeholder="Masukan Username" style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;">
			</div>
            <br>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Masukan Email" style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;">
			</div>
            <br>
			<input type="submit" value="KIRIM" class="btn btn-info">
		</form>
	</div>
	<div class="col-md-4">
		<div class="btn btn-success"><b>BERITA TERBARU</b></div>
		<hr>
		<div class="row">
			@foreach($semua as $tp)
			<a href="{{route('reader.show_news',$tp->id)}}">
				<div class="col-md-8">
					<div class="panel panel-default">
					  <div class="panel-body">
					  	<img style="width: 200px;height: 100px" class="img-rounded img-responsive" src="{{asset('foto/'.$tp->foto)}}"><br>
					  	<p><h5 style="width: 220px; font-size: 12px;">{!!substr($tp->judul,0,50)!!}...</h5></p>
					  </div>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
@endsection
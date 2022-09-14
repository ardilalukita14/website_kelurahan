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
<div class="row">
	<div class="col-md-8">
        <br></br>
		<b class="label label-info"><h3 style="margin-left:55px;"><b>LIST NEWS</b></b></h3>
		<hr>
		<div class="panel">
			<div class="panel">
				<!-- news -->
				@foreach ($news as $data)
					<div class="row" style="margin-left:10px;">
						<a href="{{route('reader.show_news',$data->id)}}" style="color:black">
							<div class="col-md-3">
								<img style="width: 800px;height: 500px;margin: 15px" class="img-rounded img-responsive" src="{{asset('foto/'.$data->foto)}}">
							</div>
							<div class="col-md-6" style="margin: 15px; width: 800px;">
                                <h3 style="width: 800px;">{{$data->judul}}</a></h3>
                                <p>{!!substr($data->isi,0,250)!!}...</p>
							</div>
						</a>
					</div>
				@endforeach
			</div>	
		</div>
	</div>
	<div class="col-md-4">
		<!-- new news -->
        <br></br>
		<b class="label label-info"><h3 style="margin-left:10px;"><b>TOP NEWS</b></b></h3>
		<hr>
		<div class="row" style="margin-left: 20px">
			@foreach($semua as $tp)
			<a href="{{route('reader.show_news',$tp->id)}}">
				<div class="col-md-8">
					<div class="panel panel-default">
					  <div class="panel-body">
					  	<img style="width: 400px;height: 200px" class="img-rounded img-responsive" src="{{asset('foto/'.$tp->foto)}}"><br>
					  	<p><h5 style="width: 400px; font-size: 14px; font-color:#072366;  text-align: justify;">{!!$tp->judul!!}</h5></p>
					  </div>
					</div>
				</div>	
            </a>
			@endforeach
		</div>
	</div>
</div>
@endsection
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    
@include('admin.layouts.sidebar')
@include('admin.layouts.header')
@extends('admin.layouts.contents')
@section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Berita</a></li>
                            <li class="active">Detail berita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

            <br></br>        
            <div class="container mt-5">
                <div class="row justify-content-center align-items-center">
                    <div class="card" style="width: 50rem; margin-left: 80px;">
                        <div class="card-header">
                            <h5 style="font-size: 18px; font-family: Arial, Helvetica"><b>Detail Data Saran Pengunjung</h5></b>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="font-size: 16px;"><b>Judul Berita: </b>{{$data->judul}}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Author Berita: </b>{{$data->author}}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Tanggal Terbit: </b>{{$data->tanggal}}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Isi Berita: </b>{!!$data->isi!!}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Berita Populer: </b>{{$data->top_news}}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Status Berita: </b>{{$data->status}}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Kategori Berita: </b>{{$data->kategori->nama}}</li>
                                <li class="list-group-item" style="font-size: 16px;"><b>Foto Berita</li>
                                <li class="list-group-item"><img style="width: 200px" src="{{asset('foto/'.$data->foto)}}"></li>
                            </ul>
                        </div>
                        <a class="btn btn-success mt-3" href="{{ route('main.berita') }}" style="font-size: 16px; margin-left:40px; margin-bottom: 30px;">Kembali</a>
                    </div>
                </div>
            </div>
            
        
<!-- /# card -->
  </div>
</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>


<script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/widgets.js"></script>
<script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script>
(function($) {
    "use strict";

    jQuery('#vmap').vectorMap({
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: ['#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
    });
})(jQuery);
</script>

</body>

</html>




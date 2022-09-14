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
    <title>Nambangan Kidul</title>
    <meta name="description" content="Nambangan Kidul">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


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
                            <li><a href="#">Pegawai</a></li>
                            <li class="active">Edit Pegawai</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

            <br></br>        
            <div class="container mt-5">
                <div class="row justify-content-center align-items-center">
                    <div class="card" style="width: 60rem;">
                        <div class="card-header">
                            <h5 style="font-size: 18px; font-family: Arial, Helvetica"><b>Edit Data Pegawai</h5></b>
                        </div>
                        <form action="{{route('pegawai.edit',$pegawai->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group" style="margin-left: 50px;">
                    <br></br>
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required="" value="{{$pegawai->nama}}" style="width:95%;">
                </div>
                <div class="form-group" style="margin-left: 50px;">
                    <br></br>
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" required="" value="{{$pegawai->nip}}" style="width:95%;">
                </div>
                <div class="form-group" style="margin-left: 50px;">
                    <br></br>
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required="" value="{{$pegawai->jabatan}}" style="width:95%;">
                </div>
                <div class="form-group" style="margin-left: 50px;">
                    <label>Keterangan</label>
                    <textarea class="ckeditor form-control valid" name="keterangan" required="" style="width:95%;">{{$pegawai->keterangan}}</textarea>
                </div>
                <input type="submit" value="SIMPAN" class="btn btn-info" style="margin-left: 50px;">
                <br></br>
            </form>
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

<script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    </script>

</body>

</html>




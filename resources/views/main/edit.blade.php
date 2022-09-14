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
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

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
                            <li class="active">Edit berita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @section('content')
            <section class="section">
            <div class="container mt-5">
            <form action="{{route('main.edit',$berita->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <br></br>
                    <label>MASUKKAN JUDUL BERITA</label>
                    <input type="text" name="judul" class="form-control" required="" value="{{$berita->judul}}" >
                </div>
                <div class="form-group">
                    <label>MASUKKAN AUTHOR BERITA</label>
                    <input type="text" name="author" class="form-control" required="" value="{{$berita->author}}" >
                </div>
                <div class="form-group">
                    <label>MASUKKAN ISI BERITA</label>
                    <textarea class="ckeditor form-control valid" name="isi" required="">{{$berita->isi}}</textarea>
                </div>
                <div class="form-group">
                    <label>MASUKKAN KATEGORI</label>
                    <select name="kategori" class="form-control">
                        <option value="{{$berita->kategori->id}}">{{$berita->kategori->nama}}</option>
                        @foreach($data as $d)
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>MASUKKAN FOTO</label>
                    <img src="{{asset('foto/'.$berita->foto)}}" style="width: 500px; height: 250px;">
                    <br></br>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group">
                    <label>TOP NEWS</label>
                    <select name="news" class="form-control">
                        <option>{{$berita->top_news}}</option>
                        <option>aktif</option>
                        <option>tidak aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>STATUS</label>
                    <select name="status" class="form-control">
                        <option>{{$berita->status}}</option>
                        <option>aktif</option>
                        <option>tidak aktif</option>
                    </select>
                </div>
                <input type="submit" value="SIMPAN" class="btn btn-info">
                <br></br>
            </form>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/admin.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    </script>

</body>

</html>

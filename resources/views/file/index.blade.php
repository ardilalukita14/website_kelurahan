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
    <link rel="stylesheet" href="vendors/filestables.net-bs4/css/filesTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/filestables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

@include('admin.layouts.sidebar')
@include('admin.layouts.header')
@extends('admin.layouts.contents')
@section('content')
@if(session()->has('message'))
        <p>{{ session()->get('message') }}</p>
    @endif
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
                            <li><a href="#">File</a></li>
                            <li class="active">files file</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">files Table</strong>
                            </div>
                            <div class="col-md-8">
                            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-files">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>

                            <div class="group">
                                <label for="file" style="margin-left: 30px; margin-top: 20px;">Upload File</label>
                                <input type="file" id="file" name="file">
                                @if($errors->has('file'))
                                    <small class="error">{{ $errors->first('file') }}</small>
                                @endif
                            </div>
                            <div class="group">
                                <button class="save btn btn-info" style="margin-left: 30px; margin-top: 10px;">Upload</button>
                                <br></br>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-files-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th width="250px">Judul</th>
                                        <th width="550px">Isi</th>
                                        <th>Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($files->count())
                                    @foreach($files as $files)
                                        <tr>
                                            <td>
                                                <div>Nama: {{ $files->nama }}</div>
                                                <div>File: {{ $files->file }}</div>
                                                <div>Ekstensi: {{ $files->extension }}</div>
                                                <div>Ukuran: {{ $files->size }}</div>
                                                <div>Mime: {{ $files->mime }}</div>
                                            </td>
                                            <td align="center"><a href="{{ url('uploads/' . $files->file) }}" download>Download</a></td>
                                        <td>                                  
                                    <form action="{{ route('files.destroy',$files->id) }}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                                </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="3">Belum ada file</td>
                                        </tr>
                                    @endif
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/filestables.net/js/jquery.filesTables.min.js"></script>
    <script src="vendors/filestables.net-bs4/js/filesTables.bootstrap4.min.js"></script>
    <script src="vendors/filestables.net-buttons/js/filesTables.buttons.min.js"></script>
    <script src="vendors/filestables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/filestables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/filestables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/filestables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/files-table/filestables-init.js"></script>


</body>

</html>

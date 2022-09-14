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
                            <li><a href="#">Komentar</a></li>
                            <li class="active">Edit komentar</li>
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
                            <h5 style="font-size: 18px; font-family: Arial, Helvetica"><b>Edit Data Pengumuman</h5></b>
                        </div>
                        <form action="{{route('komentar.do_editkomen',$data->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group" style="margin-left: 50px;">
                            <br></br>
                            <label>Keterangan</label>
                                <textarea class="form-control" name="isi" readonly="" style="width:95%;">{{$data->keterangan}}</textarea>
                            </div>
                            <div class="form-group" style="margin-left: 50px;">
                                <label>Nama Pengirim</label>
                                <input type="text" name="nama" readonly="" value="{{$data->nama}}"  class="form-control" style="width:95%;">
                            </div>
                            <div class="form-group" style="margin-left: 50px;">
                                <label>Email</label>
                                <input type="email" name="email" readonly="" class="form-control" value="{{$data->email}}" style="width:95%;">
                            </div>
                            <div class="form-group" style="margin-left: 50px;" style="width:95%;">
                                <label>Status Komentar</label>
                                <select class="form-control" name="status" style="width:95%;">
                                    <option>{{$data->status}}</option>
                                    <option>aktif</option>
                                    <option>non aktif</option>
                                </select>
                            </div>
                            <input type="submit" value="KIRIM" class="btn btn-info" style="margin-left: 50px;">
                            <br></br>
                        </form>
@endsection
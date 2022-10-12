@extends('layout.template')
@section('judul','Halaman About')
@section('title','About')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/fajar.png') }}" alt="User profile picture">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                Aplikasi ini dibuat oleh: <br>
                Nama : Ahmad Fajar Nurrudin <br>
                NIM : 1931730062 <br>
                Tanggal : 09 Oktober 2022
            </div>
        </div>
    </div>
</div>
@endsection
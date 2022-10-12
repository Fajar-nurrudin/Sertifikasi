@extends('layout.template')
@section('judul','Halaman Lihat Arsip')
@section('title','Arsip Surat >> Lihat')
@section('content')
<div class="content">
    <div class="container-fluid">

        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Nomor : {{$data->nomor_surat}} <br>
                        Kategori : {{$data->kategori}} <br>
                        Judul : {{$data->judul}} <br>
                        Waktu Unggah :{{$data->created_at}}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <iframe src="{{ asset('/data_file/'.$data->path_file)}}" width="50%" height="600">
                                This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a>
                            </iframe>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::previous() }}" type="button" class="btn btn-secondary btn-sm">
                            << Kembali</a>
                                <a href="/arsip/unduh/{{$data->path_file}}" type="button" class="btn btn-warning btn-sm">
                                    Unduh</a>
                                <a href="/arsip/edit/{{$data->id}}" type="button" class="btn btn-primary btn-sm">
                                    Edit/Ganti File</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
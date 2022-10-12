@extends('layout.template')
@section('judul','Halaman Edit Arsip')
@section('title','Arsip Surat >> Edit')
@section('content')
<div class="content">
    <div class="container-fluid">
        Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
        Catatan : <br>
        <ul>
            <li> Gunakan File Berformat PDF</li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/arsip/update/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="inputNomorSurat" class="col-sm-2 col-form-label">Nomor Surat</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control @error('inputNomorSurat') is-invalid @enderror" name="inputNomorSurat" value="{{$data->nomor_surat}}" placeholder="Masukkan Nomor Surat">
                                    @error('inputNomorSurat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-3">
                                    <select type="text" class="form-control @error('inputKategori') is-invalid @enderror" name=" inputKategori" value="{{$data->kategori}}" placeholder="Email">
                                        <option value="">{{$data->kategori}}</option>
                                        <option value="Undangan">Undangan</option>
                                        <option value="Pengumuman">Pengumuman</option>
                                        <option value="Nota Dinas">Nota Dinas</option>
                                        <option value="Pemberitahuan">Pemberitahuan</option>
                                    </select>
                                    @error('inputKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('inputJudul') is-invalid @enderror" name=" inputJudul" value="{{$data->judul}}" placeholder="Masukkan Judul Surat">
                                    @error('inputJudul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                                <div class="col-sm-3">
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="" placeholder="Masukkan File Surat">
                                    @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ URL::previous() }}" type="button" class="btn btn-secondary btn-sm">
                                << Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm"> Simpan </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout.template')
@section('judul','Halaman Arsip')
@section('title','Arsip Surat')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat. <br></div>
            <div class="col-5">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h9><i class="icon fas fa-check"></i> Sukses! {{ $message }}</h9>
                </div>
                @endif

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-1.5">
                        <h3>Cari Surat : </h3>
                    </div>
                    <div class="col-9">
                        <input type="text" id="myCustomSearchBox" class="form-control" placeholder="Search">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="col-2">
                <a href="/arsip/tambah" type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-archive"></i> Arsipkan Surat</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('arsip.index') }}",
            columns: [{
                    data: 'nomor_surat',
                    name: 'nomor_surat'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "dom": "lrtip",
            "bLengthChange": false, // this gives option for changing the number of records shown in the UI table
            "lengthMenu": [5],
        });
        $('#myCustomSearchBox').keyup(function() {
            table.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
        })
    });
</script>

@endsection
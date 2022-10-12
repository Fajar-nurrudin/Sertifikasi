<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\ArsipModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ArsipModel::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <a href="/arsip/hapus/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Lihat" class="edit btn btn-danger btn-sm lihatArsip" onclick="return confirm(\'Apa Anda Yakin Ingin Menghapus Arsip Ini?\')">Hapus</a>';
                    $btn = $btn . ' <a href="/arsip/unduh/' . $row->path_file . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Unduh" class="btn btn-warning btn-sm unduhArsip">Unduh</a>';
                    $btn = $btn . ' <a href="/arsip/lihat/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Lihat" class="edit btn btn-primary btn-sm lihatArsip">Lihat >></a>';
                    return $btn;
                })
                ->editColumn('created_at', function ($user) {
                    return [
                        'display' => e($user->created_at->format('Y-m-d H:m')),
                        'timestamp' => $user->created_at->timestamp
                    ];
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Tidak boleh kosong!',
            'mimes' => 'File harus format PDF',
        ];
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:2048',
            'inputNomorSurat' => 'required',
            'inputKategori' => 'required',
            'inputJudul' => 'required',
        ], $messages);

        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);
        ArsipModel::create([
            'nomor_surat' => $request->inputNomorSurat,
            'kategori' => $request->inputKategori,
            'judul' => $request->inputJudul,
            'path_file' => $nama_file,
        ]);
        return redirect('/arsip')->with(['success' => 'Berhasil Tambah Data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ArsipModel::all()->where('id', $id)->first();
        return view('show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ArsipModel::all()->where('id', $id)->first();
        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Tidak boleh kosong!',
            'mimes' => 'File harus format PDF',
        ];
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:2048',
            'inputNomorSurat' => 'required',
            'inputKategori' => 'required',
            'inputJudul' => 'required',
        ], $messages);

        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);
        $data = ArsipModel::find($id);
        $data->nomor_surat = $request->inputNomorSurat;
        $data->kategori = $request->inputKategori;
        $data->judul = $request->inputJudul;
        $data->path_file = $nama_file;
        $data->save();
        return redirect('/arsip')->with(['success' => 'Berhasil Update Data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ArsipModel::where('id', $id)->delete();

        return redirect('/arsip')->with(['success' => 'Berhasil Hapus Data']);
    }
    public function unduh($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = "./data_file/" . $id;
        return Response::download($file);
    }
}

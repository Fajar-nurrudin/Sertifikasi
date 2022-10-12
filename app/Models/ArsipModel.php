<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipModel extends Model
{
    use HasFactory;
    protected $table = 'tabel_arsip';
    protected $fillable = ['nomor_surat', 'kategori', 'judul', 'path_file'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['Nama', 'Notelpon', 'level', 'Alamat']; //untuk mengizinkan tabel untuk diisi
    protected $table = 'pegawai';
    public $timestamps = false; //untuk memberikan informasi pada laravel jika tidka menggunakan timestamps
}

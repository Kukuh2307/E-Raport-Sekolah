<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'nama_kelas',
        'tahun_ajaran',
        'semester',
        'guru_id',
    ];
    // relasi tabel kelas dengan tabel guru
    public function tabelGuru()
    {
        return $this->hasMany(Guru::class);
    }

    // relasi tabel kelas dengan siswa (1 kelas mimiliki banyak siswa)
    public function tabelSiswa(){
        return $this->hasMany(Siswa::class);
    }
}

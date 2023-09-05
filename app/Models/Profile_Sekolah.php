<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_Sekolah extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'nama_sekolah',
    //     // Daftar kolom lain yang ingin Anda izinkan untuk pengisian massal
    //     'foto',
    //     'status_sekolah',
    //     'kepala_tk',
    //     'jumlah_guru',
    //     'email',
    //     'alamat_sekolah',
    // ];
}

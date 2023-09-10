<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'foto',
        'nama',
        'alamat',
        'nomor_induk',
        'guru_id',
        'kelas_id',
    ];
    public $timestamps = false;
}

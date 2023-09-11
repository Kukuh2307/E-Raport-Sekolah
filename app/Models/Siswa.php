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

    // relasi siswa dengan tabel guru (1 siswa hanya boleh memiliki 1 guru, dan 1 guru memiliki banyak sisawa)
    public function tabelGuru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }

    // relasi siswa dengan tabel kelas (1 siswa hanya boleh memilii 1 kelas, dan 1 kelas memiliki banyak siswa)
        public function tabelKelas(){
            return $this->belongsTo(Kelas::class,'kelas_id');
        }
}

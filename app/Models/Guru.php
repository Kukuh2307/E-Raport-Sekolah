<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'nama',
        'email',
        'tanggal_lahir',
        'kelas_id',
        'sekolah_id',
    ];
    // relasi tabel guru ke tabel kelas
    public function tabelKelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
}

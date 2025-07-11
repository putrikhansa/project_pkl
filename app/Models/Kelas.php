<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas'; // penting! harus 'kelas', bukan 'kelass'

    public $fillable = ['nama_kelas'];

    public function jadwal_pemeriksaan()
    {
        return $this->hasMany(JadwalPemeriksaan::class, 'kelas_id');
    }
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}

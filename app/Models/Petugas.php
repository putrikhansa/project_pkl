<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas'; // pastikan nama tabel sama dengan di database

    public $fillable = ['nama', 'user_id', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jadwal pemeriksaan
    public function jadwal_pemeriksaan()
    {
        return $this->hasMany(JadwalPemeriksaan::class);
    }
    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}

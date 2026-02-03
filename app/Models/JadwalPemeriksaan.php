<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPemeriksaan extends Model
{
    protected $table = 'jadwal_pemeriksaan'; // pastikan nama tabel benar

    public $fillable = ['tanggal', 'kelas_id', 'user_id', 'keterangan'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

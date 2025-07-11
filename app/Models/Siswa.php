<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kelas_id', 'jenis_kelamin'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

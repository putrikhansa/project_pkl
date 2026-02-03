<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public $fillable = ['nama_obat', 'kategori', 'stok', 'tanggal_kadaluarsa', 'unit', 'deskripsi'];

    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }
    public function getStatusKadaluarsaAttribute()
    {
        $now = Carbon::now();
        $exp = Carbon::parse($this->tanggal_kadaluarsa);

        // Sudah kadaluarsa
        if ($now->greaterThan($exp)) {
            return 'expired';
        }

        // Hampir kadaluarsa (<= 30 hari lagi)
        if ($now->diffInDays($exp) <= 30) {
            return 'near';
        }

        // Aman
        return 'safe';
    }

}

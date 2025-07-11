<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public $fillable = ['nama_obat', 'kategori', 'stok', 'tanggal_kadaluarsa', 'unit', 'deskripsi'];

    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}

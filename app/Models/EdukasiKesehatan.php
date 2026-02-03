<?php
namespace App\Models;

use App\Models\KategoriEdukasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class EdukasiKesehatan extends Model
{
    protected $table = 'edukasi_kesehatan';

    protected $fillable = [
        'judul',
        'isi',
        'kategori_id',
        'penulis_id',
        'status',
        'tanggal_publish',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriEdukasi::class);
    }

    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}

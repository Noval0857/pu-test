<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailProyek extends Model
{
    protected $table = 'detail_proyek';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_proyek', 'nama_berkas', 'url_berkas'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }
}

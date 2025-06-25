<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyeks';
    protected $primaryKey = 'id_proyek';
    protected $fillable = ['nama_proyek', 'kontraktor', 'tahun', 'nilai'];
    public $timestamps = true;
    

    public function detailProyek()
    {
        return $this->hasMany(DetailProyek::class, 'id_proyek', 'id_proyek');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'proyek_tag', 'id_proyek', 'id_tag');
    }
}

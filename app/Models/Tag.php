<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id_tag';
    protected $fillable = ['nama'];
    public $timestamps = true;

    public function proyeks()
    {
        return $this->belongsToMany(Proyek::class, 'proyek_tag', 'id_tag', 'id_proyek');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = ['kode', 'nama', 'tipe', 'bobot', 'keterangan'];

    public function subKriteria()
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id', 'id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'kriteria_id', 'id');
    }
}

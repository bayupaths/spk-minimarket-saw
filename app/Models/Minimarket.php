<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minimarket extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'alamat', 'telepon'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'minimarket_id', 'id');
    }

    public function hasilNilai()
    {
        return $this->hasMany(HasilNilai::class, 'minimarket_id', 'id');
    }
}

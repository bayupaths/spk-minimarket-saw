<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilNilai extends Model
{
    use HasFactory;

    protected $fillabel = ['nilai', 'minimarket_id'];

    public function minimarket()
    {
        return $this->belongsTo(Minimarket::class, 'minimarket_id', 'id');
    }
}

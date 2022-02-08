<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama_diagnosa',
    ];

    public function rekammedik()
    {
        return $this->hasMany(RekamMedik::class);
    }
}

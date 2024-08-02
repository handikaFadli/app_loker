<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $guarded = ['id'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'lowongan_id');
    }
}

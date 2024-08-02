<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';

    protected $guarded = ['id'];

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'pelamar_id');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'pelamar_id');
    }

    public function keterampilan()
    {
        return $this->hasMany(Keterampilan::class, 'pelamar_id');
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'pelamar_id');
    }

    public function getUmurAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }
}

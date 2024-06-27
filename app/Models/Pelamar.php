<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';

    protected $guarded = ['id'];

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'pelamar_id');
    }
}

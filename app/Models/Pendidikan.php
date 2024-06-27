<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';

    protected $guarded = ['id'];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}

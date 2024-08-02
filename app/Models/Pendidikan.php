<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pendidikan';

    protected $guarded = ['id'];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'pelamar_id');
    }

    public function getLamaPendidikanAttribute()
    {
        $start_year = $this->mulai;
        $end_year = $this->selesai ?? date('Y');

        $duration_years = $end_year - $start_year;

        return "{$duration_years} tahun";
    }
}

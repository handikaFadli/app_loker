<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pekerjaan';

    protected $guarded = ['id'];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'pelamar_id');
    }

    public function getLamaBekerjaAttribute()
    {
        $start_year = $this->mulai;
        $end_year = $this->selesai ?? date('Y');

        $duration_years = $end_year - $start_year;

        return "{$duration_years} tahun";
    }
}

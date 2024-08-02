<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Lamaran;
use App\Models\Pelamar;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah lowongan
        $jobCount = Lowongan::count();

        // Menghitung jumlah lamaran
        $applicationCount = Lamaran::count();

        // Menghitung jumlah lamaran yang diterima
        $acceptedApplicationCount = Lamaran::where('status_lamaran', 'diterima')->count();

        // Menghitung jumlah pelamar
        $registeredApplicantCount = Pelamar::count();

        // Menghitung lowongan yang paling banyak dilamar
        $mostAppliedJobs = Lowongan::withCount('lamaran')
            ->orderBy('lamaran_count', 'desc')
            ->limit(3)
            ->get();

        // Menghitung jumlah lamaran per bulan
        $applicationsPerMonth = Lamaran::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthNames = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        return view('admin.home-admin', compact('jobCount', 'applicationCount', 'acceptedApplicationCount', 'registeredApplicantCount', 'mostAppliedJobs', 'applicationsPerMonth', 'monthNames'));
    }
}

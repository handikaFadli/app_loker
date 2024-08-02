<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Keterampilan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\LamaranNotification;
use App\Notifications\LamaranTahapAkhirNotification;
use Illuminate\Support\Facades\Notification;

class LamaranController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Lamaran::class);

        $title_alert = 'Hapus Data Lamaran';
        $text_alert = "Apakah anda yakin menghapus data ini?";
        confirmDelete($title_alert, $text_alert);

        $lamaran = Lamaran::with(['lowongan.perusahaan'])->whereNotIn('status_lamaran', ['tahap awal', 'tahap dua', 'tahap akhir'])->get();

        return view(
            'admin.lamaran.index',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $lamaran,
            ]
        );
    }

    public function tahapAwal()
    {
        Gate::authorize('viewAny', Lamaran::class);

        $data = Lamaran::with(['lowongan.perusahaan'])->where('status_lamaran', 'tahap awal')->get();

        return view(
            'admin.lamaran.tahap-awal',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $data,
            ]
        );
    }

    public function tahapDua()
    {
        Gate::authorize('viewAny', Lamaran::class);

        $data = Lamaran::with(['lowongan.perusahaan'])->where('status_lamaran', 'tahap dua')->get();

        return view(
            'admin.lamaran.tahap-dua',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $data,
            ]
        );
    }

    public function tahapAkhir()
    {
        Gate::authorize('viewAny', Lamaran::class);

        $data = Lamaran::with(['lowongan.perusahaan'])->where('status_lamaran', 'tahap akhir')->get();

        return view(
            'admin.lamaran.tahap-akhir',
            [
                'title' => 'Lamaran Pekerjaan',
                'data' => $data,
            ]
        );
    }

    public function show($id)
    {
        $lamaran = Lamaran::with('lowongan.perusahaan', 'pelamar.pendidikan', 'pelamar.pekerjaan', 'pelamar.keterampilan')->findOrFail($id);

        Gate::authorize('view', $lamaran);

        return view(
            'admin.lamaran.detail',
            [
                'title' => 'Lamaran Pekerjaan',
                'lamaran' => $lamaran,
            ]
        );
    }

    public function downloadFormulirPelamar($id)
    {
        $pelamar = Pelamar::findOrFail($id);

        $filePath = str_replace('/storage', 'public', $pelamar->formulir);

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        Gate::authorize('update', $lamaran);

        $lamaran->status_lamaran = $request->status_lamaran;
        $lamaran->save();

        Alert::success('Status Lamaran', 'Berhasil Diubah!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $lamaran = Lamaran::findOrFail($id);

        Gate::authorize('delete', $lamaran);

        $lamaran->delete();

        Alert::success('Status Lamaran', 'Berhasil Dihapus!');
        return redirect()->back();
    }

    public function updateStatusLamaran(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        Gate::authorize('updateStatusLamaran', $lamaran);

        $deskripsi = $request->deskripsi;
        $link = $request->link;

        if ($request->status_lamaran == 'tahap awal') {
            $this->sendNotification($id, $deskripsi, $link, 'tahap dua');

            Alert::success('Status Lamaran', 'Berhasil Diupdate!');
            return redirect('admin/lamaran/tahap-awal');
        } elseif ($request->status_lamaran == 'tahap dua') {
            Carbon::setLocale('id');
            $time = Carbon::parse($request->waktu)->translatedFormat('H.i');
            $date = Carbon::parse($request->waktu)->translatedFormat('l, d F Y');
            $notif = $request->description . ' Berikut terlampir waktu dan link gmeet wawancara : ' . $date . ', ' . $time . '.';

            $this->sendNotificationWawancara($id, $deskripsi, $link, $time, $date, $notif, 'tahap akhir');

            Alert::success('Status Lamaran', 'Berhasil Diupdate!');
            return redirect('admin/lamaran/tahap-dua');
        } elseif ($request->status_lamaran == 'tahap akhir') {
            $this->sendNotification($id, $deskripsi, $link, 'diterima');

            Alert::success('Status Lamaran', 'Berhasil Diupdate!');
            return redirect('admin/lamaran/tahap-akhir');
        }

        Alert::error('Proses gagal', 'Silahkan periksa kembali!');
        return redirect()->back();
    }

    public function tolakLamaran(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        Gate::authorize('updateStatusLamaran', $lamaran);

        $deskripsi = $request->deskripsi;
        $link = '';

        // menghapus formulir
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        if ($pelamar) {
            Storage::delete('public/formulir/' . basename($pelamar->formulir));

            $pelamar->formulir = "";
            $pelamar->save();
        }

        $this->sendNotification($id, $deskripsi, $link, 'ditolak');

        Alert::success('Status Lamaran', 'Berhasil Diupdate!');
        return redirect('admin/lamaran/riwayat');
    }

    public function cancelLamaran($id)
    {
        $lamaran = Lamaran::findOrFail($id);

        Gate::authorize('cancelLamaran', $lamaran);

        $users = User::whereNotIn('role', ['pelamar'])->get();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = 'Lamaran Cancel';
        $description = 'Pelamar membatalkan lamaran pada lowongan ' . $lowongan->judul;
        $link = '/admin/lamaran/riwayat';

        // Update status lamaran
        $lamaran->status_lamaran = 'dibatalkan';
        $lamaran->save();

        // menghapus formulir
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        if ($pelamar) {
            Storage::delete('public/formulir/' . basename($pelamar->formulir));

            $pelamar->formulir = "";
            $pelamar->save();
        }

        Notification::send($users, new LamaranNotification($header, $description, $link));
        return redirect()->back();
    }

    public function apply(Request $request)
    {
        // Memeriksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        Gate::authorize('applyLamaran', Lamaran::class);

        // Ambil pelamar berdasarkan email pengguna yang sedang login
        $pelamar = Pelamar::where('email', Auth::user()->email)->first();

        // Cek apakah pelamar sudah mengisi data diri atau belum
        if (is_null($pelamar->nama) || is_null($pelamar->tempat_lahir) || is_null($pelamar->tanggal_lahir)) {
            Alert::error('Apply gagal', 'Silahkan lengkapi data diri anda!');
            return redirect('/profile/create');
        }

        // Cek apakah pelamar sudah melamar pada lowongan yang sama
        $existingLamaran = Lamaran::where('pelamar_id', $pelamar->id)
            ->where('lowongan_id', $request->id)
            ->first();

        if ($existingLamaran) {
            Alert::error('Apply gagal', 'Anda sudah melamar pada lowongan ini sebelumnya!');
            return redirect()->back();
        }

        // simpan data lamaran
        $lamaran = new Lamaran();
        $lamaran->pelamar_id = $pelamar->id;
        $lamaran->lowongan_id = $request->lowongan_id;
        $lamaran->save();

        // kirim notifikasi ke admin
        $users = User::whereNotIn('role', ['pelamar'])->get();
        $lowongan = Lowongan::where('id', $request->lowongan_id)->first();

        $header = 'Lamaran Baru';
        $description = 'Terdapat lamaran baru pada lowongan ' . $lowongan->judul;
        $link = '/admin/lamaran/riwayat';
        Notification::send($users, new LamaranNotification($header, $description, $link));

        $this->sendNotifProgresLamaran($lamaran->id, 'Lamaran Anda telah berhasil dikirim, tunggu informasi selanjutnya dalam 1x7 hari di jam kerja.');

        Alert::success('Lowongan', 'Berhasil Apply!');
        return redirect('/profile/lamaran');
    }

    private function sendNotification($id_lamaran, $description, $link, $newStatus)
    {
        $lamaran = Lamaran::findOrFail($id_lamaran);
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        $user = User::where('email', $pelamar->email)->first();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = $lowongan->judul;

        // Update status lamaran
        $lamaran->status_lamaran = $newStatus;
        $lamaran->save();

        // Kirim notifikasi ke user
        $user->notify(new LamaranNotification($header, $description, $link));
    }

    private function sendNotificationWawancara($id_lamaran, $description, $link, $time, $date, $notif, $newStatus)
    {
        $lamaran = Lamaran::findOrFail($id_lamaran);
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        $user = User::where('email', $pelamar->email)->first();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = $lowongan->judul;

        // Update status lamaran
        $lamaran->status_lamaran = $newStatus;
        $lamaran->save();

        // Kirim notifikasi ke user
        $user->notify(new LamaranTahapAkhirNotification($header, $description, $link, $time, $date, $notif));
    }

    public function sendNotifProgresLamaran($id_lamaran, $deskripsi)
    {
        $lamaran = Lamaran::findOrFail($id_lamaran);
        $pelamar = Pelamar::findOrFail($lamaran->pelamar_id);
        $user = User::where('email', $pelamar->email)->first();
        $lowongan = Lowongan::where('id', $lamaran->lowongan_id)->first();

        $header = $lowongan->judul;
        $description = $deskripsi;
        $link = '';

        $user->notify((new LamaranNotification($header, $description, $link))->delay(Carbon::now()->addMinutes(10)));
    }

    public function formTahapDua()
    {
        Gate::authorize('applyLamaran', Lamaran::class);

        $pelamar = Pelamar::where('email', Auth::user()->email)->first();
        $lamaran = Lamaran::where('pelamar_id', $pelamar->id)->first();

        if ($lamaran->status_lamaran !== 'tahap dua') {
            return redirect()->back();
        } else {
            return view(
                'form-tahap-dua',
                [
                    'pelamar' => $pelamar,
                ]
            );
        }
    }

    public function downloadFormulir()
    {
        $filePath = 'public/formulir/formulir_pelamar.xlsx';
        return Storage::download($filePath);
    }

    public function uploadFormulir(Request $request)
    {
        Gate::authorize('applyLamaran', Lamaran::class);

        $request->validate(
            [
                'formulir' => 'required|mimes:xlsx,xls|max:2048',
            ],
            [
                'formulir.required' => 'Inputan formulir harus diisi',
                'formulir.mimes' => 'File formulir harus berupa file dengan format xlsx dan xls',
                'formulir.mimes' => 'File maksimal 2 mb',
            ]
        );

        $pelamar = Pelamar::where('email', Auth::user()->email)->first();

        if ($request->hasFile("formulir")) {
            if ($pelamar->formulir) {
                Storage::delete('public/formulir/' . basename($pelamar->formulir));
            }

            $file = $request->file('formulir');
            $path = $file->storeAs('public/formulir', date('YmdHis') . '-' . $pelamar->nama . '.' . $file->getClientOriginalExtension());
            $link = Storage::url($path);
        }

        $pelamar->formulir = $link ?? null;
        $pelamar->save();

        $users = User::whereNotIn('role', ['pelamar'])->get();

        $header = 'Lamaran Tahap Dua';
        $description = $pelamar->nama . 'telah mengupload formulir tahap dua';
        $link = '/admin/lamaran/tahap-dua';

        Notification::send($users, new LamaranNotification($header, $description, $link));

        $lamaran = Lamaran::where('pelamar_id', $pelamar->id)->first();

        $this->sendNotifProgresLamaran($lamaran->id, 'Formulir telah berhasil dikirim, tunggu informasi selanjutnya dalam 1x7 hari di jam kerja.');

        Alert::success('Formulir', 'Berhasil diupload!');
        return redirect('/profile/lamaran');
    }

    public function preview($jenis, $id)
    {
        // Tentukan model dan atribut berdasarkan jenis
        switch ($jenis) {
            case 'transkip':
                $model = Pendidikan::findOrFail($id);
                $filePath = $model->transkip_nilai;
                break;
            case 'ijazah':
                $model = Pendidikan::findOrFail($id);
                $filePath = $model->ijazah;
                break;
            case 'sk':
                $model = Pekerjaan::findOrFail($id);
                $filePath = $model->surat_keterangan;
                break;
            case 'sertifikat':
                $model = Keterampilan::findOrFail($id);
                $filePath = $model->sertifikat;
                break;
            case 'cv':
                $model = Pelamar::findOrFail($id);
                $filePath = $model->cv;
                break;
            default:
                return redirect()->back();
        }

        // Ubah jalur dari /storage ke public
        $filePath = str_replace('/storage', 'public', $filePath);

        // Cek apakah file ada di storage
        if (Storage::exists($filePath)) {
            $fileUrl = Storage::url($filePath);

            return view('admin.lamaran.preview', compact('fileUrl'));
        } else {
            return redirect()->back();
        }
    }

    public function print()
    {
        $lamarans = Lamaran::with(['pelamar', 'lowongan'])->get();

        return view('admin.lamaran.print', ['lamarans' => $lamarans]);
    }
}

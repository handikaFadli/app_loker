<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'email' => 'dekan@gmail.com',
            'role' => 'dekan',
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'email' => 'kaprodi@gmail.com',
            'role' => 'kaprodi',
            'password' => Hash::make('Password'),
        ]);

        DB::table('perusahaan')->insert([
            'nama' => 'Universitas Catur Insan Cendekia',
            'visi' => 'Menjadi universitas yang berorientasi dalam bidang teknologi dan kewirausahaan, untuk mendukung masyarakat daerah dengan menghasilkan lulusan yang mampu untuk menanggapi perubahan jaman',
            'misi' => json_encode([
                'Menyelenggarakan pengajaran yang berfokus untuk menghasilkan lulusan-lulusan yang mampu untuk menanggapi perubahan jaman.',
                'Mendukung dan menciptakan lingkungan yang positif untuk pembelajaran, inovasi, dan penerapan dalam bidang teknologi dan kewirausahaan.',
                'Menjalankan aktivitas Tri Dharma untuk memberikan kontribusi terhadap masyarakat daerah.',
                'Menyelenggarakan pendidikan tinggi yang terjangkau dalam memperluas akses pendidikan di masyarakat daerah.',
            ]),
            'tujuan' => json_encode([
                'Menghasilkan mahasiswa yang unggul dan berprestasi di tingkat nasional serta memiliki jiwa technopreneur.',
                'Menghasilkan sistem pembelajaran yang bermutu berbasis teknologi informasi.',
                'Menghasilkan dosen dan tenaga kependidikan yang bermutu dan kompeten dalam bidangnya.',
                'Menghasilkan penelitian dosen yang berkualitas dan memberi kontribusi bagi pengembangan riset di Indonesia.',
                'Menciptakan suasana akademik yang kondusif bagi pengembangan penelitian di institusi.',
                'Memberikan kontribusi positif bagi masyarakat melalu kegiatan pengabdian kepada masyarakat yang tepat dan bermanfaat.',
                'Mewujudkan tata pamong dan tata kelola organisasi yang efektif dan efisien.',
                'Menghasilkan kerjasama yang produktif dan bermanfaat bagi institusi dan industri/UMKM.',
            ]),
            'lokasi' => 'Jl. Kesambi No.202, Kesambi, Kota Cirebon',
            'deskripsi' => 'Universitas CIC juga menjalankan perannya sebagai Knowledge based dengan melakukan kerjasama-kerjasama dengan dunia usaha dan industri serta pemerintah daerah se-karesidenan Cirebon, baik berupa kajian kurikulum berbasis PBL (Problem Based Learning), pengiriman tenaga praktisi untuk mengajar di Universitas CIC maupun penyaluran mahasiswa/i untuk praktek kerja lapang dan menyerap lulusan Universitas CIC serta menjadikan lulusan Universitas CIC sebagai wirausaha tangguh di era global.',
            'telepon' => '0231-200418',
            'email' => 'info@cic.ac.id',
            'website' => 'https://www.cic.ac.id',
            'linkedin' => 'https://www.linkedin.com/company/universitas-catur-insan-cendekia',
            'instagram' => 'https://www.instagram.com/universitas_cic',
        ]);
    }
}

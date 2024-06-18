%%{init: {'theme': 'base', 'themeVariables': { 'primaryColor': '#ffcccc', 'primaryBorderColor': '#ff6666', 'primaryTextColor': '#000000', 'actorBorderColor': '#6666ff', 'actorTextColor': '#000000'}}}%%
usecaseDiagram
actor Pelamar

Pelamar --> (Akses Landing Page)
Pelamar --> (Login)
Pelamar --> (Register)
Pelamar --> (Lihat Profil)
Pelamar --> (Ubah Profil)
Pelamar --> (Lihat Lowongan)
Pelamar --> (Lamar Lowongan)
Pelamar --> (Lihat Status Lamaran)
Pelamar --> (Logout)
Pelamar --> (Ubah Password)

(Akses Landing Page) --> (Informasi tentang Universitas CIC)
(Akses Landing Page) --> (Daftar Lowongan)
(Akses Landing Page) --> (Login)
(Akses Landing Page) --> (Register)

(Lihat Profil) --> (Lihat Informasi Diri)
(Lihat Profil) --> (Manage Lowongan)
(Lihat Profil) --> (Lihat Notifikasi Status Lamaran)
(Lihat Profil) --> (Ubah Informasi Diri)
(Lihat Profil) --> (Ubah Password)
(Lihat Profil) --> (Logout)
```

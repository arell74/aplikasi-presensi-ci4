# 🗓️ Aplikasi Presensi CI4

[![PHP Version](https://img.shields.io/badge/PHP-%5E8.1-blue?logo=php)](https://www.php.net/) [![CodeIgniter 4](https://img.shields.io/badge/CodeIgniter-4-red?logo=codeigniter)](https://codeigniter.com/) [![License](https://img.shields.io/github/license/arell74/aplikasi-presensi-ci4)](LICENSE) [![Last Commit](https://img.shields.io/github/last-commit/arell74/aplikasi-presensi-ci4)](https://github.com/arell74/aplikasi-presensi-ci4/commits/master)

**Aplikasi Presensi CI4 / Presen-ssi** adalah sistem informasi presensi pegawai berbasis **CodeIgniter 4** untuk mengelola data kehadiran, ketidakhadiran, dan profil pegawai secara digital.  
Aplikasi ini mendukung fitur presensi harian, rekapitulasi, dan pengelolaan data pegawai dengan antarmuka yang mudah digunakan.

---

## 🚀 Fitur Utama

- **🔑 Login Multi-Role**  
  Sistem otentikasi dengan dua peran pengguna: **Admin** dan **Pegawai**.

- **📍 Presensi GPS**  
  Pegawai dapat melakukan presensi masuk dan pulang dengan validasi lokasi menggunakan GPS.

- **👤 Manajemen Pegawai**  
  Admin dapat menambah, mengedit, dan menghapus data pegawai (termasuk profil & jabatan).

- **📝 Manajemen Ketidakhadiran**  
  Pegawai dapat mengajukan izin atau cuti, sementara admin dapat mengelola & menyetujui pengajuan tersebut.

- **📊 Rekapitulasi Presensi**  
  - Tampilan rekap harian dan bulanan.  
  - Ekspor data rekap ke **Excel (.xlsx)**.

- **📅 Kalender Interaktif**  
  Kalender di dashboard admin menampilkan acara penting, rekap presensi, dan ketidakhadiran yang disetujui.

- **📂 Tampilan Profil**  
  Setiap pegawai memiliki halaman profil pribadi untuk melihat detail informasi diri.

---

## 🖥 Persyaratan Sistem

- **PHP** versi `8.1` atau lebih tinggi.
- **Composer** untuk manajemen dependensi PHP.
- **Web Server** (Apache, Nginx, dll).
- **Database** (MySQL, PostgreSQL, dll).

> Pastikan ekstensi PHP berikut aktif:
> - `intl`
> - `mbstring`
> - `json`
> - `mysqlnd` *(jika menggunakan MySQL)*
> - `libcurl`

---

## 📦 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di lokal:

### 1️⃣ Mengkloning Repositori
```bash
git clone https://github.com/USERNAME/aplikasi-presensi-ci4.git
cd aplikasi-presensi-ci4
```
### 2️⃣ Instalasi Dependensi
```bash
- composer install
```

### 3️⃣ Konfigurasi Lingkungan
```bash
buka file .env dan atur konfigurasi:

# APP
app.baseURL = 'http://localhost:8080'

# DATABASE
database.default.hostname = localhost
database.default.database = presensi_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```
### 4️⃣ Migrasi & Seeder Database
```bash
php spark migrate
php spark db:seed DatabaseSeeder
```

### 5️⃣ Menjalankan Server
```bash
php spark serve
```

## 👤 Akun Pengguna Default
| Peran   | Username | Password |
| ------- | -------- | -------- |
| Admin   | admin    | admin123 |
| Pegawai | raiden     | pegawai321 |


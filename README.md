# 🗓️ Aplikasi Todolist

[![PHP Version](https://img.shields.io/badge/PHP-%5E8.1-blue?logo=php)](https://www.php.net/) [![CodeIgniter 4](https://img.shields.io/badge/CodeIgniter-4-red?logo=codeigniter)](https://codeigniter.com/) [![License](https://img.shields.io/github/license/arell74/ukk-2025-todolist-app)](LICENSE) [![Last Commit](https://img.shields.io/github/last-commit/arell74/ukk-2025-todolist-app)](https://github.com/arell74/ukk-2025-todolist-app/commits/main)

Proyek ini merupakan salah satu proyek **UKK** jurusan Pengembangan Perangkat Lunak dan Gim. **Aplikasi To-Do List** berbasis web yang dibangun menggunakan Framework CodeIgniter 4.
Aplikasi ini dirancang untuk *membantu pengguna dalam mengelola, mencatat, dan memantau aktivitas atau tugas harian secara lebih teratur dan efisien.*

---

## 🚀 Fitur Utama

- **🔑 Login Auth**  
  Sistem login dan registrasi yang aman dengan pengelolaan peran pengguna.

- **📊 Manajemen Tugas**  
   Menambah, mengubah, menghapus, serta menandai tugas yang sudah selesai.

- **📍 Kategori & Prioritas**  
  Mengelompokkan tugas berdasarkan kategori (pekerjaan, belajar, pribadi, dll) dan tingkat prioritas (rendah, sedang, tinggi).

- **📝 Pengingat Deadline**  
  Menetapkan batas waktu (deadline) untuk setiap tugas agar tidak terlewat.

- **📅 Kalender Interaktif**  
  Menampilkan jadwal sesuai ketentuan hari.

- **📂 Tampilan Responsif**  
  Antarmuka sederhana dan rapi yang dapat diakses baik di desktop maupun perangkat mobile.

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
git clone https://github.com/arell74/ukk-2025-todolist-app.git
cd ukk-2025-todolist-app
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
database.default.database = todolist
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```
### 4️⃣ Migrasi & Seeder Database
```bash
php spark migrate
php spark db:seed AllSeeder
```

### 5️⃣ Menjalankan Server
```bash
php spark serve
```

## 👤 Akun Pengguna Default
| Email   | Username | Password |
| ------- | -------- | -------- |
| admin@gmail.com   | admin    | admin123 |


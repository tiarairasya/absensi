# Proyek Login dan Input Absensi Siswa

Proyek ini merupakan aplikasi berbasis web yang terdiri dari dua fitur utama:
1. **Login**: Untuk autentikasi pengguna sebelum masuk ke dashboard.
2. **Input Absensi Siswa**: Untuk mencatat kehadiran siswa berdasarkan tanggal dan status.

## Fitur
- Sistem login menggunakan **PHP PDO** dan **password hashing** dengan `password_verify()`.
- Form absensi yang mendukung input siswa, tanggal, dan status.
- Desain antarmuka yang responsif dengan CSS.

## Kendala yang Dihadapi
Selama pengembangan, berikut adalah beberapa kendala yang dihadapi dan bagaimana kami menyelesaikannya:

### 1. **Kesalahan Autentikasi**
   - **Masalah**: Username dan password tidak diverifikasi dengan benar.
   - **Penyebab**: Ada kesalahan dalam query SQL dan tidak semua password disimpan dalam format yang di-hash.
   - **Solusi**: 
     - Memastikan password disimpan menggunakan fungsi `password_hash()` saat pembuatan akun.
     - Menggunakan `password_verify()` untuk mencocokkan input password dengan yang ada di database.

### 2. **Tampilan Tidak Responsif**
   - **Masalah**: Form login dan absensi tidak ditampilkan dengan baik di perangkat kecil (ponsel).
   - **Penyebab**: CSS yang tidak sepenuhnya responsif.
   - **Solusi**: 
     - Menambahkan media queries untuk menyesuaikan layout pada perangkat kecil.
     - Menggunakan properti seperti `max-width` dan `flexbox`.

### 3. **Kesalahan Gambar Latar**
   - **Masalah**: Latar belakang gambar pada form login tidak muncul di browser tertentu.
   - **Penyebab**: URL gambar tidak dimuat dengan benar atau cache browser.
   - **Solusi**: 
     - Memastikan URL gambar menggunakan HTTPS untuk menghindari masalah mixed-content.
     - Menambahkan properti CSS seperti `background-size: cover` untuk memastikan gambar tampil dengan baik.

### 4. **Validasi Data**
   - **Masalah**: Data absensi dapat disubmit dengan status kosong atau tanggal yang tidak valid.
   - **Penyebab**: Kurangnya validasi di sisi server maupun klien.
   - **Solusi**: 
     - Menambahkan validasi di sisi server menggunakan PHP.
     - Menambahkan atribut HTML seperti `required` dan validasi tambahan dengan JavaScript.

### 5. **Keamanan Data**
   - **Masalah**: Potensi serangan **SQL Injection** pada form input.
   - **Penyebab**: Query SQL tidak menggunakan parameter yang di-bind.
   - **Solusi**:
     - Menggunakan prepared statement dengan bind parameter pada semua query SQL.

###  6. **Git tidak terdeteksi di terminal**
   - **Masalah**: Saat menjalankan perintah `git init`, muncul error `git: The term 'git' is not recognized`.
   - **Penyebab**: Git belum terinstal di komputer, dan Git terinstal tetapi jalurnya tidak ditambahkan ke variabel PATH di sistem operasi.
   - **Solusi**:
     - Menginstal Git dan menambahkan Git ke PATH sistem.

###  7. **Author identity unknown**
   - **Masalah**: Saat melakukan commit, muncul pesan `Author identity unknown`.
   - **Penyebab**: Nama dan email pengguna belum disetel di konfigurasi Git.
   - **Solusi**:
     - Menyetel nama dan email dengan perintah:
     ```
     git config --global user.name "Tiara Islami Rasya"
     git config --global user.email "tiarairasya184@gmail.com"
     ```

## Teknologi yang Digunakan
- **Backend**: PHP dengan PDO
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Desain Responsif**: Media Queries, Flexbox


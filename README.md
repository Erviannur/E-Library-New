Dokumentasi Aplikasi E-Library

# E-Library - Dokumentasi Proyek dan Panduan Pengguna

## Pendahuluan
Selamat datang di dokumentasi proyek E-Library. Dokumen ini akan memberikan panduan tentang proyek ini, mencakup deskripsi proyek, panduan pengguna, serta tutorial untuk menjalankan aplikasi dari awal.

## Gambaran Umum
E-Library adalah sebuah aplikasi web yang menyediakan akses kepada pengguna untuk membaca, mencari, dan mengakses berbagai jenis materi bacaan secara elektronik. Tujuan dibuatnya aplikasi E-Library yaitu untuk memudahkan pengguna dalam mengakses dan mengelola bahan bacaan secara efisien dan efektif, tanpa terbatas oleh batasan fisik tempat atau waktu. Aplikasi ini dibangun dengan menggunakan Laravel, sebuah framework PHP yang kuat dan modern.

## Fitur Pengguna
- Baca Buku
- Simpan Buku
- Profil
- Komentar
- Dashboard Admin
- Kelola Master Data 
- Kelola Aktivitas
- Kelola Pengguna

## Teknologi dan Bahasa Pemrograman
Aplikasi ini dikembangkan menggunakan teknologi berikut:
- Bahasa Pemrograman: PHP
- Framework: Laravel 10 
- Database: MySQL
## Peran Pengguna
- Administrator
- Pengunjung

## Panduan Pengguna
### Instalasi dan Konfigurasi
#### Langkah 1: Unduh Proyek
1.	Clone repositori proyek ini dari GitLab dengan perintah: git clone https://github.com/Erviannur/E-Library-New.git
#### Langkah 2: Persiapan Lingkungan
1.	Pastikan Anda memiliki PHP, Composer, dan MySQL terinstal di komputer Anda.
2.	Buat file `.env` berdasarkan contoh `.env.example` dan atur konfigurasi database sesuai dengan lingkungan Anda.
3.	Jalankan perintah berikut untuk menginstal dependensi: composer install
4.	Generate key aplikasi: php artisan key:generate
5.	Jalankan migrasi dan seeder untuk mengisi database dengan data awal: php artisan migrate --seed
#### Langkah 3: Jalankan Aplikasi
1.	Jalankan aplikasi dengan perintah: php artisan serve
2.	Buka aplikasi dalam browser pada alamat [http://localhost:8000]

### Login
1.	**Buka aplikasi dalam browser.**
2.	**Login menggunakan kredensial yang sudah ada.**
-	**Isi Email dan Kata Sandi**: Masukkan alamat email dan kata sandi Anda yang telah Anda daftarkan sebelumnya.
-	**Klik "Masuk"**: Klik tombol "Masuk" untuk mengirimkan informasi login Anda.
-	**Selamat!**: Anda sekarang masuk ke Aplikasi E-Library dan dapat mulai mencari, membaca, dan menyimpan buku.

### Register
1.	**Daftar jika anda belum memiliki akun**
-	**Klik "Daftar"**: Klik opsi "Daftar" pada bagian "Belum Punya Akun? Daftar".
-	**Isi Form Daftar**: Isi seluruh form dengan data yang sesuai. Masukkan nama Anda untuk form Username, masukkan alamat email Anda untuk form E-mail, masukkan kata sandi Anda untuk form Password, dan masukkan ulang kata sandi Anda untuk form Konfirmasi Password.
-	**Klik "Daftar"**: Klik tombol "Daftar" untuk mendaftarkan akun Anda.
-	**Selamat!**: Anda sekarang terdaftar di aplikasi E-Library. Silahkan Login untuk mulai menggunakan aplikasi E-Library.

### Data Kredensial Default
1.	**Administrator**:
-	email: admin@gmail.com
-	password: rosaline123
    
2.	**Pengunjung** 
-	email: caroline@gmail.com
-	password: caroline123

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

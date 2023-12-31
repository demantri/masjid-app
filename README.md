<p align="center">
    <a href="https://github.com/demantri" target="_blank"></a>
</p>

## Tentang Aplikasi

Aplikasi ini dibuat untuk digunakan sebagai pencatatan keuangan kas masuk dan kas keluar pada Masjid. Aplikasi ini dibuat menggunakan Laravel versi 9.* dan minimal PHP v8x. Jadi sebelum melakukan installasi, pastikan PHP tersebut sudah digunakan dan terinstall.

### Beberapa Fitur yang tersedia:
- Masterdata
  - Kelola COA (chart of account)
  - Kelola Kas
  - Kelola Detail Kas
  - Kelola Kegiatan Masjid
- Arus Kas Keuangan
  - Kas Masuk
  - Kas Keluar
  - Kegiatan Masjid
- Laporan
  - Kas Masuk
  - Kas Keluar
  - Jurnal Umum
  - Bukubesar
- Manajemen User
- Manajemen Role
- Grafik ChartJS pada Dashboard

## Instalasi
#### Via Git
```bash
git clone https://github.com/demantri/masjid-app.git
```

### Download ZIP
[Link](https://github.com/demantri/masjid-app/archive/refs/heads/main.zip)

### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_masjid
DB_USERNAME=root
DB_PASSWORD=
```
Opsional
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:QGRW4K7UVzS2M5HE2ZCLlUuiCtOIzRSfb38iWApkphE=
APP_DEBUG=true
APP_URL=http://localhost
```
Generate key
```bash
php artisan key:generate
```
Menjalankan aplikasi
```bash
php artisan serve
```

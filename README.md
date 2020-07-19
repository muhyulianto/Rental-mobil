## Rental mobil berbasis web

Sistem informasi penyewaan mobil yang dibuat dengan laravel 6.0.

## Cara penginstalan

Silakan periksa panduan instalasi resmi laravel untuk persyaratan server sebelum anda mulai menginstall. [Official Documentation](https://laravel.com/docs/6.0/installation#installation)

Clone repository ini

```bash
git clone git@github.com:muhyulianto/Rental.git
```
Install semua dependencies yang dibutuhkan menggunakan composer
```bash
composer install
```
Ubah nama file .env.example menjadi .env. lalu jalankan perintah
```bash
php artisan key:generate
```
Jalankan database migration ( atur dahulu koneksi database di .env file )
```bash
php artisan migrate
```

## Tampilan web

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Movie App Laravel (TMDB API)

# Tahap Install
1.  Tambahkan baris berikut di akhir file .env
> TMDB_API_KEY=<<API_KEY>>
  ganti API_KEY dengan API_KEY yang valid

2.  Buat database, konfig bagian database di file .env lalu jalankan perintah
```
php artisan migrate:fresh --seed
```

3.  Jalankan perintah untuk running web server laravel
```
php artisan serve
```

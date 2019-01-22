# CRUD Portal Berita With Laravel

# Installation

Download terlebih dahulu filenya dengan perintah seperti di bawah
```sh
$ git clone https://github.com/shofwan22/detik.git
```
Kemudian jalankan perintah-perintah di bawah ini
```sh
$ composer dump autoload
$ composer update --no-scripts
```

Kemudian cari file bernama .env.example di dalam folder project , dan buka isi file tersebut.
Selanjutnya buat file baru dengan nama .env , dan copy semua isi dari file .env.example , setelah itu di save.

Kemudian jalankan perintah
```sh
$ php artisan key:generate
```

### Import Database
Cari file dengan nama detik.sql di dalam project untuk di import ke database anda.

Kemudian buka file .env anda dan sesuaikan konfigurasi database anda pada bagian seperti di bawah ini 
```sh
$ DB_CONNECTION=mysql
$ DB_HOST=127.0.0.1
$ DB_PORT=3306
$ DB_DATABASE=homestead
$ DB_USERNAME=homestead
$ DB_PASSWORD=secret
```
Ubahlah pada bagian DB_DATABASE sesuai dengan nama database yang anda buat seperti contoh dibawah ini 
```sh
$ DB_DATABASE=detik
```

Kemudian sesuaikan username dan password databasenya seperti pada bagian di bawah ini,jika database anda tidak memiliki password, maka kosongkan saja pada bagian DB_PASSWORD.
```sh
$ DB_USERNAME=root
$ DB_PASSWORD=
```

Jika sudah silahkan membuka web tersebut di browser anda, dan jangan lupa untuk menambahkan /public pada bagian belakang url yang anda ketik.
Contohnya jika anda menggunakan localhost dan folder project anda bernama detik, maka alamat URLnya seperti di bawah ini
```sh
localhost/detik/public
```

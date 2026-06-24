# Sistem Manajemen Karyawan & Transaksi

## Deskripsi
Aplikasi web untuk manajemen data karyawan dan transaksi berbasis Laravel dengan fitur autentikasi dan CRUD lengkap.

## Persyaratan Sistem
- PHP 8.1 atau lebih tinggi
- Composer
- MySQL 5.7 atau lebih tinggi
- Node.js & NPM (optional untuk asset)

## Langkah Instalasi
1. Clone Repository
bash
git clone https://github.com/username-anda/employee-transaction-system.git
cd employee-transaction-system
2. Install Dependencies
bash
composer install
3. Setup Environment
bash
# Copy file .env.example menjadi .env
copy .env.example .env
# atau untuk Linux/Mac:
cp .env.example .env
4. Konfigurasi Database
Edit file .env dan sesuaikan dengan database Anda:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_transaction_db
DB_USERNAME=root
DB_PASSWORD=
5. Generate Application Key
bash
php artisan key:generate
6. Buat Database
Buka PHPMyAdmin atau terminal MySQL:

sql
CREATE DATABASE employee_transaction_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
7. Jalankan Migrasi
bash
php artisan migrate
8. Jalankan Seeder (Data Awal)
bash
php artisan db:seed
9. Jalankan Aplikasi
bash
php artisan serve
C. AKSES APLIKASI
Setelah menjalankan php artisan serve, buka browser dan akses:

text
http://localhost:8000
Default Login:
Field	Value
Email	admin@asietex.com
Password	password1. Clone Repository
bash
git clone https://github.com/username-anda/employee-transaction-system.git
cd employee-transaction-system
2. Install Dependencies
bash
composer install
3. Setup Environment
bash
# Copy file .env.example menjadi .env
copy .env.example .env
# atau untuk Linux/Mac:
cp .env.example .env
4. Konfigurasi Database
Edit file .env dan sesuaikan dengan database Anda:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_transaction_db
DB_USERNAME=root
DB_PASSWORD=
5. Generate Application Key
bash
php artisan key:generate
6. Buat Database
Buka PHPMyAdmin atau terminal MySQL:

sql
CREATE DATABASE employee_transaction_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
7. Jalankan Migrasi
bash
php artisan migrate
8. Jalankan Seeder (Data Awal)
bash
php artisan db:seed
9. Jalankan Aplikasi
bash
php artisan serve
C. AKSES APLIKASI
Setelah menjalankan php artisan serve, buka browser dan akses:

text
http://localhost:8000
Default Login:
Field	Value
Email	admin@asietex.com
Password	password

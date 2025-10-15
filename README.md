# 💰 Kas Kecil - Aplikasi Pencatat Keuangan

Aplikasi web sederhana untuk mencatat pemasukan dan pengeluaran keuangan pribadi.

## 🚀 Fitur

- ✅ Login & Register
- ✅ Input pemasukan & pengeluaran
- ✅ Kategori transaksi (Makanan, Transport, dll)
- ✅ Total saldo otomatis
- ✅ Laporan per bulan
- ✅ Grafik pemasukan vs pengeluaran (Chart.js)

## 🛠️ Teknologi

- Laravel 11
- MySQL
- Bootstrap 5
- Chart.js
- Laravel Breeze (Authentication)

## 📦 Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/renaldidnp/kas-kecil.git
cd kas-kecil
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Setup Database
Edit file `.env`:
```
DB_DATABASE=kas_kecil
DB_USERNAME=root
DB_PASSWORD=
```

Buat database:
```sql
CREATE DATABASE kas_kecil;
```

Jalankan migration & seeder:
```bash
php artisan migrate --seed
```

### 5. Jalankan Aplikasi
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Buka browser: `http://localhost:8000`

## 📸 Screenshot

_(Coming soon)_

## 👨‍💻 Author

**Renaldi**
- GitHub: [@renaldidnp](https://github.com/renaldidnp)

## 📄 License

MIT License

---

⭐ **Jangan lupa kasih star jika project ini bermanfaat!**

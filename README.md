# Aplikasi CRUD Mahasiswa - MVC PHP

Aplikasi web sederhana untuk mengelola data mahasiswa menggunakan pola arsitektur MVC (Model-View-Controller) dengan PHP dan MySQL.

## 📋 Fitur

- ✅ Lihat daftar semua mahasiswa
- ✅ Tambah data mahasiswa baru
- ✅ Edit data mahasiswa
- ✅ Hapus data mahasiswa

## 🛠️ Teknologi

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Frontend:** HTML5, CSS3, Bootstrap 5.3
- **Font:** Google Fonts (Poppins)

## 📁 Struktur Folder

```
mvc/
├── Config/
│   └── Database.php          # Konfigurasi koneksi database
├── Controllers/
│   └── MahasiswaController.php # Controller untuk mengelola request
├── Models/
│   └── Mahasiswa.php          # Model untuk query database
└── Views/
    ├── index.php              # Entry point / routing utama
    ├── Mahasiswa-list.php     # View list mahasiswa
    ├── Mahasiswa-add.php      # View form tambah mahasiswa
    ├── Mahasiswa-edit.php     # View form edit mahasiswa
    ├── layout.php             # Layout template global
    └── assets/
        └── style.css          # Custom stylesheet
```

## 🚀 Instalasi & Setup

### 1. Clone Repository
```bash
git clone https://github.com/USERNAME/mvc-mahasiswa.git
cd mvc-mahasiswa
```

### 2. Setup Database
1. Buka phpMyAdmin (http://localhost/phpmyadmin)
2. Buat database baru dengan nama `mvc`
3. Jalankan SQL berikut:

```sql
CREATE TABLE mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  nim VARCHAR(20) NOT NULL UNIQUE
);

-- Insert sample data (opsional)
INSERT INTO mahasiswa (nama, nim) VALUES 
('John Doe', '123456'),
('Jane Smith', '123457');
```

### 3. Konfigurasi Database (jika diperlukan)
Edit file `Config/Database.php`:

```php
private $host = "localhost";      // Host database
private $dbname = "mvc";           // Nama database
private $username = "root";        // Username
private $password = "";            // Password
```

### 4. Jalankan Aplikasi
- **Dengan XAMPP:** 
  - Pastikan Apache dan MySQL sudah running
  - Buka browser: `http://localhost/mvc/Views/index.php`

- **Dengan PHP Built-in Server:**
  ```bash
  cd Views
  php -S localhost:8000
  ```
  Buka: `http://localhost:8000/index.php`

## 📝 Cara Penggunaan

1. **Lihat Daftar Mahasiswa:**
   - Akses halaman utama (index.php)
   - Akan menampilkan semua data mahasiswa dalam tabel

2. **Tambah Data:**
   - Klik tombol "Tambah Data"
   - Isi form (Nama dan NIM)
   - Klik "Simpan"

3. **Edit Data:**
   - Klik "Edit" pada baris mahasiswa yang ingin diubah
   - Ubah data sesuai kebutuhan
   - Klik "Update"

4. **Hapus Data:**
   - Klik "Hapus" pada baris mahasiswa
   - Konfirmasi penghapusan
   - Data akan dihapus dari database

## 🔧 Troubleshooting

### Error: "Failed opening required '../Models/Mahasiswa.php'"
- Pastikan path file benar
- Jalankan dari folder `Views/` atau sesuaikan path di routing

### Error: "Koneksi database gagal"
- Pastikan MySQL sudah running
- Cek username, password, dan nama database di `Config/Database.php`
- Pastikan database `mvc` sudah dibuat

### Error: "Undefined variable $data"
- Pastikan controller memanggil method model dengan benar
- Cek apakah data dari database kosong

## 📚 File Penting

| File | Fungsi |
|------|--------|
| `Views/index.php` | Routing (controller dispatcher) |
| `Controllers/MahasiswaController.php` | Business logic |
| `Models/Mahasiswa.php` | Database queries |
| `Config/Database.php` | Database connection |
| `Views/layout.php` | HTML template master |

## 🎨 Customization

### Mengubah Styling
Edit file `Views/assets/style.css` atau tambahkan CSS custom di layout.php

### Menambah Field Mahasiswa
1. Tambah kolom di tabel database:
   ```sql
   ALTER TABLE mahasiswa ADD COLUMN email VARCHAR(100);
   ```
2. Update form di view files (Mahasiswa-add.php, Mahasiswa-edit.php)
3. Update model query di Mahasiswa.php

## 📄 License

MIT License - Bebas digunakan untuk keperluan personal maupun komersial

## 👨‍💻 Author

Dibuat dengan ❤️ Atmint menggunakan PHP MVC Pattern

---

**Catatan:** Aplikasi ini dibuat untuk tujuan pembelajaran. Untuk production, pastikan mengimplementasikan security best practices seperti input validation, prepared statements (sudah ada), dan proper error handling.

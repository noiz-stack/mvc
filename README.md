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
│   └── Database.php            # Konfigurasi koneksi database
├── Controllers/
│   └── MahasiswaController.php # Controller untuk mengelola request
├── Models/
│   └── Mahasiswa.php           # Model untuk query database
├── Views/
│   ├── index.php               # Entry point / routing utama
│   ├── layout.php              # Layout header (HTML pembuka, navbar, CSS)
│   ├── Mahasiswa-list.php      # View daftar mahasiswa (tabel)
│   ├── Mahasiswa-add.php       # View form tambah mahasiswa
│   ├── Mahasiswa-edit.php      # View form edit mahasiswa
│   └── assets/
│       └── style.css           # Custom stylesheet
├── .gitignore                  # File yang diabaikan Git
└── README.md                   # Dokumentasi ini
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

## 🏗️ Arsitektur: Header & Footer Partial Pattern

Aplikasi ini menggunakan **header-footer partial pattern** untuk memisahkan struktur HTML:

### Cara Kerja

```
Alur request → View → Hasil HTML
  ↓
Setiap view (Mahasiswa-list.php, Mahasiswa-add.php, dll):
  1. Include layout.php (header) → buka <!DOCTYPE>, <head>, <body>, navbar
  2. Tampilkan konten view (tabel/form)
  3. Include footer.php → tutup </main>, </body>, </html>
```

### File-file Penting

| File         | Fungsi                                    |
| ------------ | ----------------------------------------- |
| `layout.php` | Header: DOCTYPE, head (CSS), body, navbar |
| `*-list.php` | Fragment: tabel mahasiswa                 |
| `*-add.php`  | Fragment: form input tambah               |
| `*-edit.php` | Fragment: form input edit                 |

### Keuntungan Pola Ini

✅ **Konsistensi:** navbar/CSS/JS dimuat sekali di semua halaman
✅ **Maintenance:** ubah layout di satu file, berlaku ke semua view
✅ **Fleksibilitas:** view hanya fokus konten (table/form), bukan struktur HTML
✅ **Safety:** output di-escape dengan `htmlspecialchars()` untuk cegah XSS

## 🎨 Customization

### Mengubah Styling

1. **Custom CSS:** Edit `Views/assets/style.css`
2. **Ubah Navbar:** Edit section `<nav>` di `Views/layout.php`

### Menambah Field Mahasiswa

1. **Database:** Tambah kolom di tabel:

   ```sql
   ALTER TABLE mahasiswa ADD COLUMN email VARCHAR(100);
   ```

2. **Model** (`Models/Mahasiswa.php`): Update query `store()` dan `update()` untuk include kolom baru

3. **View** (`Mahasiswa-add.php`, `Mahasiswa-edit.php`): Tambah input baru:
   ```php
   <div class="mb-3">
       <label class="form-label">Email</label>
       <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>">
   </div>
   ```

## 🔗 Integrasi Git & GitHub

Aplikasi ini sudah siap untuk version control. Berikut cara push ke GitHub:

### 1. Inisialisasi Repository (jika belum)

```bash
cd c:\xampp\htdocs\mvc
git init
git config user.name "Nama Anda"
git config user.email "email@anda.com"
```

### 2. Tambah Remote Repository

```bash
git remote add origin https://github.com/USERNAME/mvc-mahasiswa.git
```

(Ganti `USERNAME` dengan username GitHub Anda)

### 3. Commit & Push

```bash
# Lihat file yang berubah
git status

# Tambah semua file ke staging area
git add .

# Commit dengan pesan yang jelas
git commit -m "Initial commit: MVC CRUD app with header/footer pattern"

# Push ke branch main
git push -u origin main
```

### 4. Workflow Sehari-hari

Setelah setup awal, workflow berulang adalah:

```bash
# 1. Buat perubahan di file lokal

# 2. Lihat apa yang berubah
git status

# 3. Stage perubahan (semua atau file spesifik)
git add .                  # semua file
# atau
git add Views/index.php    # file spesifik

# 4. Commit dengan pesan deskriptif
git commit -m "Fix: sanitize output dengan htmlspecialchars"

# 5. Push ke GitHub
git push
```

### Git Concepts untuk Dipelajari

**Status Perubahan File:**

- `Untracked`: file baru, belum di-track git
- `Modified`: file sudah ada, tapi berubah
- `Staged`: file sudah di-`add`, siap di-commit

**Branch:**

- Gunakan branch terpisah untuk fitur baru (best practice)
- Contoh:
  ```bash
  git checkout -b feature/tambah-validasi
  # ... buat perubahan ...
  git add .
  git commit -m "Add: input validation di form"
  git push -u origin feature/tambah-validasi
  ```

**Commit Message Best Practice:**

- Mulai dengan kata kunci: `Add:`, `Fix:`, `Update:`, `Remove:`
- Contoh: `Add: validasi email di model Mahasiswa`
- Hindari: `fix bug`, `update`, `changes`

**Pull Request (PR) untuk Kolaborasi:**

- Setelah push branch baru, buat PR di GitHub
- Tim/reviewer bisa review kode sebelum merge ke main

## 📚 Resources untuk Belajar Lebih Lanjut

- [Git Documentation](https://git-scm.com/doc)
- [GitHub Guides](https://guides.github.com/)
- [PHP PDO Tutorial](https://www.php.net/manual/en/book.pdo.php)
- [Bootstrap Documentation](https://getbootstrap.com/docs/5.3/)

## 📄 License

MIT License - Bebas digunakan

## 👨‍💻 Author

Dibuat dengan ❤️ Atmint menggunakan PHP MVC Pattern

---

**Catatan:** Aplikasi ini dibuat untuk tujuan pembelajaran. Untuk production, pastikan mengimplementasikan security best practices seperti input validation, prepared statements (sudah ada), dan proper error handling.

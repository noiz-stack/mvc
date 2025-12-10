# 📚 Panduan Step-by-Step: Push ke GitHub

Berikut panduan lengkap untuk Anda belajar dan push perubahan ke GitHub.

## ✅ Prasyarat

- Git sudah install dan terkonfigurasi di komputer
- Sudah ada akun GitHub
- Repository sudah di-create di GitHub
- Remote `origin` sudah ditambahkan (Anda bisa cek dengan `git remote -v`)

## 🚀 Langkah-Langkah (Step-by-Step)

### Langkah 1: Lihat Status Perubahan

```bash
cd c:\xampp\htdocs\mvc
git status
```

**Output yang akan Anda lihat:**
```
On branch main
Changes not staged for commit:
  modified:   README.md
  modified:   Views/Mahasiswa-add.php
  modified:   Views/Mahasiswa-edit.php
  modified:   Views/Mahasiswa-list.php
  modified:   Views/layout.php
```

**Penjelasan:**
- `Changes not staged for commit` = file sudah berubah tapi belum di-`add` (belum siap di-commit)
- Warna merah = file yang belum di-staging area

### Langkah 2: Review Perubahan (Opsional tapi Recommended)

Lihat apa saja yang berubah di file spesifik:

```bash
git diff Views/layout.php
```

**Atau lihat semua perubahan:**
```bash
git diff
```

Tekan `q` untuk keluar dari paging view.

### Langkah 3: Stage Perubahan (Add ke Staging Area)

**Option A: Stage Semua File**
```bash
git add .
```

**Option B: Stage File Tertentu**
```bash
git add README.md
git add Views/layout.php
git add Views/footer.php
```

**Penjelasan:**
- `git add .` = tambahkan SEMUA file yang berubah ke staging area
- Staging area = antrian file yang siap di-commit

### Langkah 4: Verifikasi Staging

```bash
git status
```

**Output yang akan Anda lihat:**
```
On branch main
Changes to be committed:
  (use "git restore --staged <file>..." to unstage)
        modified:   README.md
        modified:   Views/Mahasiswa-add.php
        ...
```

**Penjelasan:**
- `Changes to be committed` = file sudah di-staging area, siap di-commit
- Warna hijau = file yang sudah di-staging

### Langkah 5: Commit (Simpan Snapshot Kode)

```bash
git commit -m "Update: perbaiki layout dengan header-footer pattern dan tambahkan dokumentasi"
```

**Penjelasan:**
- `git commit` = buat snapshot (versi) kode yang sudah di-staging
- `-m` flag = attach pesan singkat deskriptif
- Pesan commit = penjelasan apa yang Anda ubah (penting untuk dokumentasi)

### Langkah 6: Verifikasi Commit

```bash
git log --oneline
```

**Output yang akan Anda lihat:**
```
a1b2c3d (HEAD -> main) Update: perbaiki layout dengan header-footer pattern
8f7e6d5 (origin/main) Initial commit
```

**Penjelasan:**
- `HEAD -> main` = commit terbaru di branch main lokal
- `origin/main` = commit terbaru di GitHub (remote)
- Jika ada perbedaan = ada commit lokal yang belum di-push

### Langkah 7: Push ke GitHub

```bash
git push
```

**atau (lebih eksplisit):**
```bash
git push origin main
```

**Penjelasan:**
- `git push` = kirim commit lokal ke GitHub
- `origin` = nama remote repository (GitHub Anda)
- `main` = nama branch

### Langkah 8: Verifikasi Push Berhasil

```bash
git status
```

**Output yang akan Anda lihat:**
```
On branch main
Your branch is up to date with 'origin/main'.
nothing to commit, working tree clean
```

**✅ Selesai!** Perubahan Anda sudah ada di GitHub.

Cek di browser: https://github.com/USERNAME/mvc-mahasiswa (ganti USERNAME)

---

## 📋 Cheat Sheet: Perintah Git Penting

| Perintah               | Fungsi                                    |
| ---------------------- | ----------------------------------------- |
| `git status`           | Lihat status file (modified, staged, dll) |
| `git diff`             | Lihat detail perubahan kode                |
| `git add .`            | Stage semua file yang berubah             |
| `git add <file>`       | Stage file spesifik                       |
| `git restore <file>`   | Batalkan perubahan file (revert)          |
| `git commit -m "msg"`  | Commit dengan pesan                       |
| `git log`              | Lihat history commit                      |
| `git log --oneline`    | Lihat history commit (ringkas)            |
| `git push`             | Push commit ke remote (GitHub)            |
| `git pull`             | Pull perubahan dari remote ke lokal       |

---

## 🤔 Konsep Penting untuk Dipahami

### 1. **Working Directory vs Staging Area vs Repository**

```
Working Directory (file lokal)
         ↓ (git add)
Staging Area (antrian siap commit)
         ↓ (git commit)
Repository (history git lokal)
         ↓ (git push)
Remote (GitHub)
```

### 2. **Branch**

- `main` = branch utama (production-ready)
- Untuk fitur baru, buat branch terpisah:
  ```bash
  git checkout -b feature/email-validation
  # ... buat perubahan ...
  git add .
  git commit -m "Add: email validation"
  git push -u origin feature/email-validation
  ```
- Kemudian buat Pull Request (PR) di GitHub untuk merge ke main

### 3. **Commit Message Best Practice**

❌ Hindari:
- `fix`
- `update`
- `changes`
- `asdf`

✅ Gunakan:
- `Add: fitur baru`
- `Fix: bug di validasi form`
- `Update: dokumentasi README`
- `Remove: file yang tidak dipakai`

Contoh format: `[Type]: [Deskripsi]`
- `Add:` = menambah fitur/file baru
- `Fix:` = memperbaiki bug
- `Update:` = mengubah fitur/dokumentasi yang sudah ada
- `Remove:` = menghapus fitur/file
- `Refactor:` = mengubah struktur kode (tidak ada perubahan fungsionalitas)

### 4. **Pull Request (PR) untuk Kolaborasi**

Workflow di tim:
1. Buat branch baru: `git checkout -b feature/xxx`
2. Commit perubahan: `git commit -m "..."`
3. Push branch: `git push -u origin feature/xxx`
4. Buka PR di GitHub (interface)
5. Tim review kode
6. Jika OK, merge PR ke main
7. Delete branch

---

## ⚠️ Troubleshooting

### Error: "Permission denied (publickey)"

**Penyebab:** SSH key belum setup atau tidak terdeteksi

**Solusi:**
```bash
# Cek apakah SSH key ada
ls ~/.ssh

# Jika tidak ada, generate baru
ssh-keygen -t rsa -b 4096

# Copy public key ke clipboard
cat ~/.ssh/id_rsa.pub

# Paste ke GitHub Settings → SSH Keys
# https://github.com/settings/keys
```

### Error: "Could not read from remote repository"

**Penyebab:** Remote URL salah atau tidak ada akses

**Solusi:**
```bash
# Lihat remote yang sudah ada
git remote -v

# Update remote jika salah
git remote set-url origin https://github.com/USERNAME/mvc-mahasiswa.git

# Atau hapus dan tambah ulang
git remote remove origin
git remote add origin https://github.com/USERNAME/mvc-mahasiswa.git
```

### Ingin Batalkan Commit (Belum Push)

```bash
# Lihat commit terbaru
git log --oneline

# Batalkan commit terakhir (file kembali di-staging)
git reset --soft HEAD~1

# atau batalkan + remove dari staging
git reset HEAD~1

# atau batalkan total (hilang data, hati-hati!)
git reset --hard HEAD~1
```

---

## 🎯 Next Steps untuk Belajar Lebih

1. **Merge Conflicts:** Belajar resolve conflict saat merge branch
2. **Rebase:** Alternatif cara merge dengan history lebih rapi
3. **Stash:** Simpan perubahan sementara tanpa commit
4. **Tag:** Buat versi release (v1.0, v1.1, dll)
5. **GitHub Actions:** Automated testing/deployment

---

## 📚 Referensi

- [Git Official Docs](https://git-scm.com/doc)
- [GitHub Hello World](https://guides.github.com/activities/hello-world/)
- [Atlassian Git Tutorials](https://www.atlassian.com/git/tutorials)

---

**Happy Coding! 🚀**

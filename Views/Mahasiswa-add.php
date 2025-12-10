<?php
include __DIR__ . '/../Views/layout.php';
$nama = $data['nama'] ?? '';
$nim = $data['nim'] ?? '';
$errors = $data['errors'] ?? [];
?>

<div class="container mt-4">
    <h2><?= htmlspecialchars($title ?? 'Tambah Mahasiswa') ?></h2>

    <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $err): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="POST" action="index.php?action=store" class="mt-3">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($nama) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($nim) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>


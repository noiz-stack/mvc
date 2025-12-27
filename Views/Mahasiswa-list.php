<?php
include __DIR__ . '/../Views/layout.php';
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Mahasiswa</h2>
        <a href="index.php?action=create" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): foreach ($data as $m): ?>
                <tr>
   <td><?= htmlspecialchars($m['id']) ?></td>
   <td><?= htmlspecialchars($m['nama']) ?></td>
   <td><?= htmlspecialchars($m['nim']) ?></td>
 <td>
  <a href="index.php?action=edit&id=<?= $m['id'] ?>" 
  class="btn btn-sm btn-warning">Edit</a>
<a href="index.php?action=delete&id=<?= $m['id'] ?>"
 class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
</tr>
<?php endif; ?>
 </table>
 </div>
</div>



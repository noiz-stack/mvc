<h2>Daftar Mahasiswa</h2>

<a href="index.php?action=create">Tambah Data</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($data as $m): ?>
    <tr>
        <td><?= $m['id'] ?></td>
        <td><?= $m['nama'] ?></td>
        <td><?= $m['nim'] ?></td>
        <td>
            <a href="index.php?action=edit&id=<?= $m['id'] ?>">Edit</a> |
            <a href="index.php?action=delete&id=<?= $m['id'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

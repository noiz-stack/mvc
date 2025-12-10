<h2>Edit Mahasiswa</h2>

<form method="POST" action="index.php?action=update&id=<?= $data['id'] ?>">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
    NIM:  <input type="text" name="nim" value="<?= $data['nim'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
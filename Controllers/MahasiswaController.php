<?php
// Controllers/MahasiswaController.php
require_once __DIR__ . '/../Models/Mahasiswa.php';
// Controller untuk mengelola data Mahasiswa
class MahasiswaController 
{
    public function index()
    {//memanggil model Mahasiswa dan mengambil semua data
        $model = new Mahasiswa();
        $data = $model->getAll();
        include __DIR__ . '/../Views/Mahasiswa-list.php';
    }
//menampilkan form tambah data mahasiswa
public function create()
{//memanggil view Mahasiswa-add.php
    include __DIR__ . '/../Views/Mahasiswa-add.php';
}//menyimpan data mahasiswa baru
public function store()
{//memanggil model Mahasiswa dan menyimpan data
    $model = new Mahasiswa ();
    $model->store($_POST['nama'], $_POST['nim']);
    header("Location: index.php");
}
public function edit($id)
{
    $model = new Mahasiswa();
    $data = $model->find($id);
    include __DIR__ . '/../Views/Mahasiswa-edit.php';

}
public function update($id)
{
    $model = new Mahasiswa();
    $model->update($id, $_POST['nama'], $_POST['nim']);
    header("Location: index.php");
}
public function delete($id)
{
    $model = new Mahasiswa();
    $model->delete($id);
    header("Location: index.php");

}
}
<?php

require_once __DIR__ . '/../Models/Mahasiswa.php';

class MahasiswaController 
{
    public function index()
    {
        $model = new Mahasiswa();
        $data = $model->getAll();
        include __DIR__ . '/../Views/Mahasiswa-list.php';
    }

public function create()
{
    include __DIR__ . '/../Views/Mahasiswa-add.php';
}
public function store()
{
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
<?php

require_once __DIR__ . '/../Config/Database.php';

class Mahasiswa{
    private $conn;
//konstruktor untuk koneksi database
    public function __construct()
        {
            $db = new Database();
            $this->conn = $db->connect();

        }//mengambil semua data mahasiswa
        public function getAll()
        {//menjalankan query select
            $stmt = $this->conn->query("SELECT * FROM mahasiswa");
            //mengembalikan hasil sebagai array asosiatif
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }//menyimpan data mahasiswa baru
        public function store($nama, $nim)
        {//menyiapkan dan menjalankan query insert
         $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nama, nim) VALUES (?, ?)");
        return $stmt->execute([$nama, $nim]);
        }
        public function find($id)
        {
            $stmt = $this->conn->prepare("SELECT * FROM mahasiswa WHERE id=?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function update($id, $nama, $nim)
        {
            $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama=?, nim=? WHERE id=?");
            return $stmt->execute([$nama, $nim, $id]);
        }
        public function delete ($id)
        {
            $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE id=?");
            return $stmt->execute([$id]);
        }

    
}
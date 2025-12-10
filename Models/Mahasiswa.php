<?php

require_once __DIR__ . '/../Config/Database.php';

class Mahasiswa{
    private $conn;

    public function __construct()
        {
            $db = new Database();
            $this->conn = $db->connect();

        }
        public function getAll()
        {
            $stmt = $this->conn->query("SELECT * FROM mahasiswa");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function store($nama, $nim)
        {
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
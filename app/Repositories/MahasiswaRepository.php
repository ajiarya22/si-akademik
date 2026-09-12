<?php
require_once __DIR__ . '/../Core/Database.php';

class MahasiswaRepository {
    private $db;

    // Constructor Dependency Injection dari objek Database
    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function getAllWithProdi() {
        $query = "SELECT m.*, p.nama AS nama_prodi 
                  FROM mahasiswa m 
                  LEFT JOIN prodi p ON m.prodi_id = p.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function search($keyword) {
        $query = "SELECT m.*, p.nama AS nama_prodi 
                  FROM mahasiswa m 
                  LEFT JOIN prodi p ON m.prodi_id = p.id 
                  WHERE m.nama LIKE :keyword OR m.nim LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT * FROM mahasiswa WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function insert($data) {
        $query = "INSERT INTO mahasiswa (nim, nama, email, prodi_id, angkatan, status) 
                  VALUES (:nim, :nama, :email, :prodi_id, :angkatan, :status)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nim' => $data['nim'],
            ':nama' => $data['nama'],
            ':email' => $data['email'],
            ':prodi_id' => $data['prodi_id'],
            ':angkatan' => $data['angkatan'],
            ':status' => $data['status']
        ]);
    }

    public function update($id, $data) {
        $query = "UPDATE mahasiswa 
                  SET nim = :nim, nama = :nama, email = :email, prodi_id = :prodi_id, angkatan = :angkatan, status = :status 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':nim' => $data['nim'],
            ':nama' => $data['nama'],
            ':email' => $data['email'],
            ':prodi_id' => $data['prodi_id'],
            ':angkatan' => $data['angkatan'],
            ':status' => $data['status']
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function getAllProdi() {
        $query = "SELECT * FROM prodi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
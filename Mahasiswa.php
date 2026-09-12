<?php

class Mahasiswa {
    private $id;
    private $nim;
    private $nama;
    private $email;
    private $prodi_id;
    private $angkatan;
    private $status;

    // Getter & Setter NIM dengan Validasi Angka
    public function getNim() { 
        return $this->nim; 
    }
    public function setNim($nim) {
        if (!is_numeric($nim)) {
            throw new Exception("NIM harus berupa angka!");
        }
        $this->nim = $nim;
    }

    // Getter & Setter Nama dengan Validasi Tidak Boleh Kosong
    public function getNama() { 
        return $this->nama; 
    }
    public function setNama($nama) {
        if (empty(trim($nama))) {
            throw new Exception("Nama mahasiswa tidak boleh kosong!");
        }
        if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
            throw new Exception("Nama mahasiswa hanya boleh berisi huruf!");
        }
        $this->nama = $nama;
    }

    // Getter & Setter Atribut Lainnya
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getProdiId() { return $this->prodi_id; }
    public function setProdiId($prodi_id) { $this->prodi_id = $prodi_id; }

    public function getAngkatan() { return $this->angkatan; }
    public function setAngkatan($angkatan) { $this->angkatan = $angkatan; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}
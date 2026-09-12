<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../../Mahasiswa.php';
require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';

// Poin 1 & 2 BKPM: Extending BaseController (Inheritance)
class MahasiswaController extends Controller {
    private $mahasiswaRepo;

    // Point 3 BKPM: Constructor Dependency Injection
    public function __construct(MahasiswaRepository $repository) {
        $this->mahasiswaRepo = $repository;
    }

    public function index() {
        $keyword = $_GET['keyword'] ?? null;
        if (!empty($keyword)) {
            $dataMahasiswa = $this->mahasiswaRepo->search($keyword);
        } else {
            $dataMahasiswa = $this->mahasiswaRepo->getAllWithProdi();
        }
        
        // Memakai method view() dari BaseController
        $this->view('mahasiswa/index', ['dataMahasiswa' => $dataMahasiswa]);
    }

    public function create() {
        $dataProdi = $this->mahasiswaRepo->getAllProdi();
        // Memakai method view() dari BaseController
        $this->view('mahasiswa/tambah', ['dataProdi' => $dataProdi]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $mhs = new Mahasiswa();
                $mhs->setNim($_POST['nim']);
                $mhs->setNama($_POST['nama']);

                $this->mahasiswaRepo->insert($_POST);
                $_SESSION['flash'] = "Data mahasiswa berhasil disimpan!";
                
                // Memakai method redirect() dari BaseController
                $this->redirect('/acara-6/public/mahasiswa');
            } catch (Exception $e) {
                echo "<script>alert('" . $e->getMessage() . "'); window.history.back();</script>";
                exit;
            }
        }
    }

    public function edit($id) {
        $mhs = $this->mahasiswaRepo->getById($id);
        $dataProdi = $this->mahasiswaRepo->getAllProdi();
        
        // Memakai method view() dari BaseController
        $this->view('mahasiswa/edit', [
            'mhs' => $mhs,
            'dataProdi' => $dataProdi
        ]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $mhs = new Mahasiswa();
                $mhs->setNim($_POST['nim']);
                $mhs->setNama($_POST['nama']);

                $this->mahasiswaRepo->update($id, $_POST);
                $_SESSION['flash'] = "Data mahasiswa berhasil diperbarui!";
                
                // Memakai method redirect() dari BaseController
                $this->redirect('/acara-6/public/mahasiswa');
            } catch (Exception $e) {
                echo "<script>alert('" . $e->getMessage() . "'); window.history.back();</script>";
                exit;
            }
        }
    }

    public function delete($id) {
        $this->mahasiswaRepo->delete($id);
        $_SESSION['flash'] = "Data mahasiswa berhasil dihapus!";
        
        // Memakai method redirect() dari BaseController
        $this->redirect('/acara-6/public/mahasiswa');
    }
}
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load Controllers & Middleware
require_once '../app/Controllers/AuthController.php';
require_once '../app/Core/Middleware/AuthMiddleware.php';

// Load Dependensi Acara 9 (Database, Entity Class, & Repository)
require_once '../app/Core/Database.php';
require_once '../Mahasiswa.php';
require_once '../app/Repositories/MahasiswaRepository.php';
require_once '../app/Controllers/MahasiswaController.php';

// Inisialisasi Auth
$authController = new AuthController();
$authMiddleware = new AuthMiddleware();

// Inisialisasi Dependency Injection
$db = new Database();
$mahasiswaRepo = new MahasiswaRepository($db);
$mahasiswaController = new MahasiswaController($mahasiswaRepo);

// Ambil path URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = '/acara-6/public';
$uri = str_replace($base_path, '', $uri);

$method = $_SERVER['REQUEST_METHOD'];
// Handling Route & Autentikasi
if ($uri === '' || $uri === '/' || $uri === '/login') {
    if ($method === 'GET') {
        $authController->loginForm();
    } elseif ($method === 'POST') {
        $authController->login();
    }
} elseif ($uri === '/dashboard') {
    $authMiddleware->before();
    
    echo "<h1>Selamat Datang di Halaman Dashboard</h1>";
    if (isset($_SESSION['flash'])) {
        echo "<p style='color: green;'>" . $_SESSION['flash'] . "</p>";
        unset($_SESSION['flash']);
    }
    echo "<a href='/acara-6/public/mahasiswa'>Kelola Data Mahasiswa</a> | ";
    echo "<a href='/acara-6/public/logout'>Logout</a>";
} elseif ($uri === '/logout') {
    $authController->logout();

// CRUD ACARA 9
} elseif ($uri === '/mahasiswa') {
    $authMiddleware->before();
    $mahasiswaController->index();

} elseif ($uri === '/mahasiswa/tambah') {
    $authMiddleware->before();
    if ($method === 'GET') {
        $mahasiswaController->create();
    }

} elseif ($uri === '/mahasiswa/store') {
    $authMiddleware->before();
    if ($method === 'POST') {
        $mahasiswaController->store();
    }

} elseif (strpos($uri, '/mahasiswa/edit/') === 0) {
    $authMiddleware->before();
    $id = explode('/', $uri)[3] ?? null;
    if ($method === 'GET') {
        $mahasiswaController->edit($id);
    }

} elseif (strpos($uri, '/mahasiswa/update/') === 0) {
    $authMiddleware->before();
    $id = explode('/', $uri)[3] ?? null;
    if ($method === 'POST') {
        $mahasiswaController->update($id); 
    }

} elseif (strpos($uri, '/mahasiswa/delete/') === 0) {
    $authMiddleware->before();
    $id = explode('/', $uri)[3] ?? null;
    $mahasiswaController->delete($id);

// 404 NOT FOUND
} else {
    http_response_code(404);
    echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
}
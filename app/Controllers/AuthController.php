<?php
// app/Controllers/AuthController.php

class AuthController {
    
    public function loginForm() {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Simulasi login menggunakan hardcode username dan password
        if ($username === 'admin' && $password === 'admin123') {
            $_SESSION['user'] = $username;
            
            $_SESSION['flash'] = "Selamat datang, " . htmlspecialchars($username);
            
            header('Location: /acara-6/public/dashboard');
            exit;
        } else {
            // Jika login gagal, kembalikan ke form login
            $_SESSION['error'] = "Username atau Password salah!";
            header('Location: /acara-6/public/login');
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        
        // Mulai session baru hanya untuk membawa pesan flash logout
        session_start();
        $_SESSION['flash'] = "Anda telah logout";
        
        header('Location: /acara-6/public/login');
        exit;
    }
}
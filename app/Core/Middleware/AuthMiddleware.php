<?php

class AuthMiddleware {
    public function before() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek apakah session 'user' ada dan tidak kosong
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            $_SESSION['error'] = "Silakan login terlebih dahulu!";
            header('Location: /acara-6/public/login');
            exit;
        }
    }
}
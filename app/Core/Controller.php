<?php

class Controller {
    protected function view($viewPath, $data = []) {
        extract($data);
        $file = __DIR__ . '/../../app/Views/' . $viewPath . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            die("View file tidak ditemukan: " . $file);
        }
    }

    protected function redirect($url) {
        header("Location: " . $url);
        exit;
    }
}
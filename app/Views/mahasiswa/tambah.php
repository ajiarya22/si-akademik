<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Tambah Data Mahasiswa</h5>
        </div>
        <div class="card-body">
            <form action="/acara-6/public/mahasiswa/store" method="POST">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Prodi</label>
                    <input type="number" name="prodi_id" class="form-control" value="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" value="2024" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="aktif">Aktif</option>
                        <option value="cuti">Cuti</option>
                        <option value="lulus">Lulus</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Simpan</button>
                <a href="/acara-6/public/mahasiswa" class="btn btn-secondary w-100 mt-2">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
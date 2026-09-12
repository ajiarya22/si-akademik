<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Edit Data Mahasiswa</h5>
        </div>
        <div class="card-body">
            <form action="/acara-6/public/mahasiswa/update/<?= $mhs['id']; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($mhs['nim']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($mhs['nama']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($mhs['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Prodi</label>
                    <input type="number" name="prodi_id" class="form-control" value="<?= htmlspecialchars($mhs['prodi_id']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" value="<?= htmlspecialchars($mhs['angkatan']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="aktif" <?= $mhs['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                        <option value="cuti" <?= $mhs['status'] == 'cuti' ? 'selected' : ''; ?>>Cuti</option>
                        <option value="lulus" <?= $mhs['status'] == 'lulus' ? 'selected' : ''; ?>>Lulus</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning w-100">Update Data</button>
                <a href="/acara-6/public/mahasiswa" class="btn btn-secondary w-100 mt-2">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
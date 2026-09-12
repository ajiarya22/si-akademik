<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - Acara 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Mahasiswa</h4>
            <div>
                <a href="/acara-6/public/dashboard" class="btn btn-outline-light btn-sm me-2">Kembali ke Dashboard</a>
                <a href="/acara-6/public/mahasiswa/tambah" class="btn btn-light btn-sm">+ Tambah Mahasiswa</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Program Studi</th>
                        <th>Angkatan</th>
                        <th>Status</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($dataMahasiswa)): ?>
                        <?php $no = 1; foreach ($dataMahasiswa as $mhs): ?>
                            <?php
                                $badgeColor = 'info';
                                switch ($mhs['status']) {
                                    case 'aktif': $badgeColor = 'success'; break;
                                    case 'cuti': $badgeColor = 'warning'; break;
                                    case 'lulus': $badgeColor = 'secondary'; break;
                                }
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($mhs['nim']); ?></td>
                                <td><?= htmlspecialchars($mhs['nama']); ?></td>
                                <td><?= htmlspecialchars($mhs['email']); ?></td>
                                <td><?= htmlspecialchars($mhs['nama_prodi']); ?></td>
                                <td><?= htmlspecialchars($mhs['angkatan']); ?></td>
                                <td>
                                    <span class="badge bg-<?= $badgeColor; ?>">
                                        <?= ucfirst(htmlspecialchars($mhs['status'])); ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="/acara-6/public/mahasiswa/edit/<?= $mhs['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/acara-6/public/mahasiswa/delete/<?= $mhs['id']; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Data Mahasiswa Belum Tersedia</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action="/acara-6/public/mahasiswa" method="GET" class="d-flex gap-2">
                            <input type="text" 
                                name="keyword" 
                                class="form-control" 
                                placeholder="Cari berdasarkan Nama atau NIM..." 
                                value="<?= htmlspecialchars($_GET['keyword'] ?? ''); ?>">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <?php if (!empty($_GET['keyword'])): ?>
                                <a href="/acara-6/public/mahasiswa" class="btn btn-secondary">Reset</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </table>
        </div>
    </div>
</div>

</body>
</html>
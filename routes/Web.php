// routes/Web.php
<?php
// Read (Tampil Data)
$router->add('GET', '/mahasiswa', 'MahasiswaController@index');

// Create (Form Tambah & Simpan)
$router->add('GET', '/mahasiswa/tambah', 'MahasiswaController@create');
$router->add('POST', '/mahasiswa/store', 'MahasiswaController@store');

// Update (Form Edit & Simpan Perubahan)
$router->add('GET', '/mahasiswa/edit/{id}', 'MahasiswaController@edit');
$router->add('POST', '/mahasiswa/update/{id}', 'MahasiswaController@update');

// Delete (Hapus Data)
$router->add('GET', '/mahasiswa/delete/{id}', 'MahasiswaController@delete');
?>
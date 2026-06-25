<?php

require_once __DIR__ . "/../database/koneksi.php";

require_once __DIR__ . "/../classes/Mahasiswa.php";
require_once __DIR__ . "/../classes/MahasiswaMandiri.php";
require_once __DIR__ . "/../classes/MahasiswaBidikmisi.php";
require_once __DIR__ . "/../classes/MahasiswaPrestasi.php";

?>

<!DOCTYPE html>

<html>
<head>
    <title>Daftar Registrasi Pembayaran Kuliah</title>

```
<style>
    body{
        font-family: Arial, sans-serif;
        margin:20px;
    }

    table{
        border-collapse: collapse;
        width:100%;
        margin-bottom:30px;
    }

    th, td{
        border:1px solid #000;
        padding:8px;
    }

    th{
        background:#ddd;
    }

    h1{
        text-align:center;
    }

    h2{
        background:#f2f2f2;
        padding:10px;
    }
</style>
```

</head>
<body>

<h1>DAFTAR REGISTRASI PEMBAYARAN KULIAH MAHASISWA</h1>

<!-- MAHASISWA MANDIRI -->

<h2>Mahasiswa Mandiri</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Semester</th>
    <th>Spesifikasi Akademik</th>
    <th>Total Tagihan</th>
</tr>

<?php

$data = $koneksi->query("
SELECT *
FROM tabel_mahasiswa
WHERE jenis_pembiayaan='Mandiri'
");

while($row = $data->fetch(PDO::FETCH_ASSOC))
{
    $mhs = new MahasiswaMandiri(
        $row['id_mahasiswa'],
        $row['nama_mahasiswa'],
        $row['nim'],
        $row['semester'],
        $row['tarif_ukt_nominal'],
        $row['golongan_ukt'],
        $row['nama_wali']
    );

?>

<tr>
    <td><?= $row['id_mahasiswa']; ?></td>
    <td><?= $row['nama_mahasiswa']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['semester']; ?></td>
    <td><?= $mhs->tampilkanSpesifikasiAkademik(); ?></td>
    <td>Rp <?= number_format($mhs->hitungTagihanSemester(),0,',','.'); ?></td>
</tr>

<?php } ?>

</table>

<!-- MAHASISWA BIDIKMISI -->

<h2>Mahasiswa Bidikmisi</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Semester</th>
    <th>Spesifikasi Akademik</th>
    <th>Total Tagihan</th>
</tr>

<?php

$data = $koneksi->query("
SELECT *
FROM tabel_mahasiswa
WHERE jenis_pembiayaan='Bidikmisi'
");

while($row = $data->fetch(PDO::FETCH_ASSOC))
{
    $mhs = new MahasiswaBidikmisi(
        $row['id_mahasiswa'],
        $row['nama_mahasiswa'],
        $row['nim'],
        $row['semester'],
        $row['tarif_ukt_nominal'],
        $row['nomor_kip_kuliah'],
        $row['dana_saku_subsidi']
    );

?>

<tr>
    <td><?= $row['id_mahasiswa']; ?></td>
    <td><?= $row['nama_mahasiswa']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['semester']; ?></td>
    <td><?= $mhs->tampilkanSpesifikasiAkademik(); ?></td>
    <td>Rp <?= number_format($mhs->hitungTagihanSemester(),0,',','.'); ?></td>
</tr>

<?php } ?>

</table>

<!-- MAHASISWA PRESTASI -->

<h2>Mahasiswa Prestasi</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Semester</th>
    <th>Spesifikasi Akademik</th>
    <th>Total Tagihan</th>
</tr>

<?php

$data = $koneksi->query("
SELECT *
FROM tabel_mahasiswa
WHERE jenis_pembiayaan='Prestasi'
");

while($row = $data->fetch(PDO::FETCH_ASSOC))
{
    $mhs = new MahasiswaPrestasi(
        $row['id_mahasiswa'],
        $row['nama_mahasiswa'],
        $row['nim'],
        $row['semester'],
        $row['tarif_ukt_nominal'],
        $row['nama_instansi_beasiswa'],
        $row['minimal_ipk_syarat']
    );

?>

<tr>
    <td><?= $row['id_mahasiswa']; ?></td>
    <td><?= $row['nama_mahasiswa']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['semester']; ?></td>
    <td><?= $mhs->tampilkanSpesifikasiAkademik(); ?></td>
    <td>Rp <?= number_format($mhs->hitungTagihanSemester(),0,',','.'); ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>

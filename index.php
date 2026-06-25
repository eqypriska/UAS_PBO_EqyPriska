<?php

require_once "database/koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Registrasi Pembayaran Kuliah</title>

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

        th,td{
            border:1px solid black;
            padding:8px;
        }

        th{
            background:#eaeaea;
        }

        h2{
            background:#ddd;
            padding:10px;
        }
    </style>
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
    <th>Golongan UKT</th>
    <th>Nama Wali</th>
    <th>Tarif UKT</th>
    <th>Total Tagihan</th>
</tr>

<?php

$query = $koneksi->query("
SELECT * FROM tabel_mahasiswa
WHERE jenis_pembiayaan='Mandiri'
");

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $tagihan = $row['tarif_ukt_nominal'] + 100000;

    echo "
    <tr>
        <td>{$row['id_mahasiswa']}</td>
        <td>{$row['nama_mahasiswa']}</td>
        <td>{$row['nim']}</td>
        <td>{$row['semester']}</td>
        <td>{$row['golongan_ukt']}</td>
        <td>{$row['nama_wali']}</td>
        <td>Rp ".number_format($row['tarif_ukt_nominal'],0,',','.')."</td>
        <td>Rp ".number_format($tagihan,0,',','.')."</td>
    </tr>
    ";
}

?>

</table>

<!-- BIDIKMISI -->

<h2>Mahasiswa Bidikmisi</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Semester</th>
    <th>No KIP</th>
    <th>Dana Saku</th>
    <th>Total Tagihan</th>
</tr>

<?php

$query = $koneksi->query("
SELECT * FROM tabel_mahasiswa
WHERE jenis_pembiayaan='Bidikmisi'
");

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    echo "
    <tr>
        <td>{$row['id_mahasiswa']}</td>
        <td>{$row['nama_mahasiswa']}</td>
        <td>{$row['nim']}</td>
        <td>{$row['semester']}</td>
        <td>{$row['nomor_kip_kuliah']}</td>
        <td>Rp ".number_format($row['dana_saku_subsidi'],0,',','.')."</td>
        <td>Rp 0</td>
    </tr>
    ";
}

?>

</table>

<!-- PRESTASI -->

<h2>Mahasiswa Prestasi</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Semester</th>
    <th>Instansi Beasiswa</th>
    <th>Minimal IPK</th>
    <th>Tarif UKT</th>
    <th>Total Tagihan</th>
</tr>

<?php

$query = $koneksi->query("
SELECT * FROM tabel_mahasiswa
WHERE jenis_pembiayaan='Prestasi'
");

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $tagihan = $row['tarif_ukt_nominal'] * 0.25;

    echo "
    <tr>
        <td>{$row['id_mahasiswa']}</td>
        <td>{$row['nama_mahasiswa']}</td>
        <td>{$row['nim']}</td>
        <td>{$row['semester']}</td>
        <td>{$row['nama_instansi_beasiswa']}</td>
        <td>{$row['minimal_ipk_syarat']}</td>
        <td>Rp ".number_format($row['tarif_ukt_nominal'],0,',','.')."</td>
        <td>Rp ".number_format($tagihan,0,',','.')."</td>
    </tr>
    ";
}

?>

</table>

</body>
</html>
<?php

require_once __DIR__ . "/../database/koneksi.php";
require_once __DIR__ . "/../classes/Mahasiswa.php";
require_once __DIR__ . "/../classes/MahasiswaMandiri.php";
require_once __DIR__ . "/../classes/MahasiswaBidikmisi.php";
require_once __DIR__ . "/../classes/MahasiswaPrestasi.php";

$jenis = $_GET['jenis'] ?? '';
$cari  = $_GET['cari'] ?? '';

$sql = "SELECT * FROM tabel_mahasiswa WHERE 1=1";

if ($jenis != '') {
    $sql .= " AND jenis_pembiayaan = '$jenis'";
}

if ($cari != '') {
    $sql .= " AND (
        nama_mahasiswa LIKE '%$cari%'
        OR nim LIKE '%$cari%'
    )";
}

$data = $koneksi->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Registrasi Pembayaran Kuliah Mahasiswa</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin:20px;
        }

        h1{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid black;
            padding:10px;
        }

        th{
            background:#ddd;
        }

        .menu{
            margin-top:15px;
            margin-bottom:15px;
        }

        .menu a{
            text-decoration:none;
            border:1px solid black;
            padding:8px 12px;
            margin-right:5px;
        }

        form{
            margin-bottom:20px;
        }
    </style>
</head>

<body>

<h1>DAFTAR REGISTRASI PEMBAYARAN KULIAH MAHASISWA</h1>

<form method="GET">

    <input
        type="text"
        name="cari"
        placeholder="Cari Nama atau NIM"
        value="<?= htmlspecialchars($cari) ?>"
    >

    <select name="jenis">
        <option value="">Semua</option>

        <option value="Mandiri"
            <?= ($jenis == 'Mandiri') ? 'selected' : '' ?>>
            Mandiri
        </option>

        <option value="Bidikmisi"
            <?= ($jenis == 'Bidikmisi') ? 'selected' : '' ?>>
            Bidikmisi
        </option>

        <option value="Prestasi"
            <?= ($jenis == 'Prestasi') ? 'selected' : '' ?>>
            Prestasi
        </option>

    </select>

    <button type="submit">Cari</button>

</form>

<div class="menu">
    <a href="index.php">Semua</a>
    <a href="index.php?jenis=Mandiri">Mandiri</a>
    <a href="index.php?jenis=Bidikmisi">Bidikmisi</a>
    <a href="index.php?jenis=Prestasi">Prestasi</a>
</div>

<table>

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Semester</th>
    <th>Jenis Pembiayaan</th>
    <th>Spesifikasi Akademik</th>
    <th>Total Tagihan</th>
</tr>

<?php

while($row = $data->fetch(PDO::FETCH_ASSOC))
{

    if($row['jenis_pembiayaan'] == 'Mandiri')
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
    }
    elseif($row['jenis_pembiayaan'] == 'Bidikmisi')
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
    }
    else
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
    }

?>

<tr>
    <td><?= $row['id_mahasiswa']; ?></td>
    <td><?= $row['nama_mahasiswa']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['semester']; ?></td>
    <td><?= $row['jenis_pembiayaan']; ?></td>
    <td><?= $mhs->tampilkanSpesifikasiAkademik(); ?></td>
    <td>
        Rp <?= number_format($mhs->hitungTagihanSemester(),0,',','.'); ?>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>
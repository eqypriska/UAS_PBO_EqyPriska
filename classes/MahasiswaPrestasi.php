<?php

require_once "Mahasiswa.php";

class MahasiswaPrestasi extends Mahasiswa
{
    protected $namaInstansiBeasiswa;
    protected $minimalIpkSyarat;

    public function __construct(
        $id_mahasiswa,
        $nama_mahasiswa,
        $nim,
        $semester,
        $tarifUktNominal,
        $namaInstansiBeasiswa,
        $minimalIpkSyarat
    ) {
        parent::__construct(
            $id_mahasiswa,
            $nama_mahasiswa,
            $nim,
            $semester,
            $tarifUktNominal
        );

        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    public function hitungTagihanSemester()
    {
    return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik()
    {
        return "Instansi Beasiswa : $this->namaInstansiBeasiswa
                <br>Minimal IPK : $this->minimalIpkSyarat";
    }

    // Query SELECT WHERE
    public function getDataPrestasi($koneksi, $id)
    {
        $sql = "SELECT * FROM tabel_mahasiswa
                WHERE id_mahasiswa = ?
                AND jenis_pembiayaan = 'Prestasi'";

        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
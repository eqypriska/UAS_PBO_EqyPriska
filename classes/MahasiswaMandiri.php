<?php

require_once "Mahasiswa.php";

class MahasiswaMandiri extends Mahasiswa
{
    protected $golonganUkt;
    protected $namaWali;

    public function __construct(
        $id_mahasiswa,
        $nama_mahasiswa,
        $nim,
        $semester,
        $tarifUktNominal,
        $golonganUkt,
        $namaWali
    ) {
        parent::__construct(
            $id_mahasiswa,
            $nama_mahasiswa,
            $nim,
            $semester,
            $tarifUktNominal
        );

        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    public function hitungTagihanSemester()
    {
    return $this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik()
    {
        return "Golongan UKT : $this->golonganUkt
                <br>Nama Wali : $this->namaWali";
    }

    // Query SELECT WHERE
    public function getDataMandiri($koneksi, $id)
    {
        $sql = "SELECT * FROM tabel_mahasiswa
                WHERE id_mahasiswa = ?
                AND jenis_pembiayaan = 'Mandiri'";

        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
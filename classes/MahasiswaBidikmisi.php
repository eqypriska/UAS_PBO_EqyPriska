<?php

require_once "Mahasiswa.php";

class MahasiswaBidikmisi extends Mahasiswa
{
    protected $nomorKipKuliah;
    protected $danaSakuSubsidi;

    public function __construct(
        $id_mahasiswa,
        $nama_mahasiswa,
        $nim,
        $semester,
        $tarifUktNominal,
        $nomorKipKuliah,
        $danaSakuSubsidi
    ) {
        parent::__construct(
            $id_mahasiswa,
            $nama_mahasiswa,
            $nim,
            $semester,
            $tarifUktNominal
        );

        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    public function hitungTagihanSemester()
    {
        return 0;
    }

    public function tampilkanSpesifikasiAkademik()
    {
        return "Nomor KIP : $this->nomorKipKuliah
                <br>Dana Saku : Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.');
    }

    // Query SELECT WHERE
    public function getDataBidikmisi($koneksi, $id)
    {
        $sql = "SELECT * FROM tabel_mahasiswa
                WHERE id_mahasiswa = ?
                AND jenis_pembiayaan = 'Bidikmisi'";

        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
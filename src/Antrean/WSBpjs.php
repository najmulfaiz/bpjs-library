<?php
namespace NajmulFaiz\Bpjs\Antrean;
use NajmulFaiz\Bpjs\BpjsService;

class WSBpjs extends BpjsService
{
    public function refPoli()
    {
        return $this->getAntrol('ref/poli');
    }

    public function refDokter()
    {
        return $this->getAntrol('ref/dokter');
    }

    public function refJadwalDokter($kodepoli, $tanggal)
    {
        return $this->getAntrol('jadwaldokter/kodepoli/'.$kodepoli.'/tanggal/'.$tanggal);
    }

    public function updateJadwalDokter($data = [])
    {
        return $this->postAntrol('jadwaldokter/updatejadwaldokter', $data);
    }

    public function tambahAntrean($data = [])
    {
        return $this->postAntrol('antrean/add', $data);
    }

    public function updateWaktuAntrean($data = [])
    {
        return $this->postAntrol('antrean/updatewaktu', $data);
    }

    public function batalAntrean($data = [])
    {
        return $this->postAntrol('antrean/batal', $data);
    }

    public function listWaktuTaskId($data = [])
    {
        return $this->postAntrol('antrean/getlisttask', $data);
    }

    public function dashboardPerTanggal($tanggal, $waktu)
    {
        return $this->getAntrol('dashboard/waktutunggu/tanggal/'.$tanggal.'/waktu/'.$waktu);
    }

    public function dashboardPerBulan($bulan, $tahun, $waktu)
    {
        return $this->getAntrol('dashboard/waktutunggu/bulan/'.$bulan.'/tahun/'.$tahun.'/waktu/'.$waktu);
    }
}
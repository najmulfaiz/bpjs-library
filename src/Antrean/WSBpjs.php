<?php
namespace NajmulFaiz\Bpjs\Antrean;
use NajmulFaiz\Bpjs\BpjsService;

class WSBpjs extends BpjsService
{
    public function refPoli()
    {
        $response = $this->getAntrol('ref/poli');
        return json_decode($response, true);
    }

    public function refDokter()
    {
        $response = $this->getAntrol('ref/dokter');
        return json_decode($response, true);
    }

    public function refJadwalDokter($kodepoli, $tanggal)
    {
        $response = $this->getAntrol('jadwaldokter/kodepoli/'.$kodepoli.'/tanggal/'.$tanggal);
        return json_decode($response, true);
    }

    public function updateJadwalDokter($data = [])
    {
        $response = $this->postAntrol('jadwaldokter/updatejadwaldokter', $data);
        return json_decode($response, true);
    }

    public function tambahAntrean($data = [])
    {
        $response = $this->postAntrol('antrean/add', $data);
        return json_decode($response, true);
    }

    public function updateWaktuAntrean($data = [])
    {
        $response = $this->postAntrol('antrean/updatewaktu', $data);
        return json_decode($response, true);
    }

    public function batalAntrean($data = [])
    {
        $response = $this->postAntrol('antrean/batal', $data);
        return json_decode($response, true);
    }

    public function listWaktuTaskId($data = [])
    {
        $response = $this->postAntrol('antrean/getlisttask', $data);
        return json_decode($response, true);
    }

    public function dashboardPerTanggal($tanggal, $waktu)
    {
        $response = $this->getAntrol('dashboard/waktutunggu/tanggal/'.$tanggal.'/waktu/'.$waktu);
        return json_decode($response, true);
    }

    public function dashboardPerBulan($bulan, $tahun, $waktu)
    {
        $response = $this->getAntrol('dashboard/waktutunggu/bulan/'.$bulan.'/tahun/'.$tahun.'/waktu/'.$waktu);
        return json_decode($response, true);
    }
}
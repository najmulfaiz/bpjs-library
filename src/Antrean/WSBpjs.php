<?php
namespace NajmulFaiz\Bpjs\Antrean;
use NajmulFaiz\Bpjs\BpjsService;

class WSBpjs extends BpjsService
{
    public function refPoli()
    {
        $response = $this->get('ref/poli');
        return json_decode($response, true);
    }

    public function refDokter()
    {
        $response = $this->get('ref/dokter');
        return json_decode($response, true);
    }

    public function refJadwalDokter($kodepoli, $tanggal)
    {
        $response = $this->get('jadwaldokter/kodepoli/'.$kodepoli.'/tanggal/'.$tanggal);
        return json_decode($response, true);
    }

    public function updateJadwalDokter($data = [])
    {
        $response = $this->post('jadwaldokter/updatejadwaldokter');
        return json_decode($response, true);
    }

    public function tambahAntrean($data = [])
    {
        $response = $this->post('antrean/add');
        return json_decode($response, true);
    }

    public function updateWaktuAntrean($data = [])
    {
        $response = $this->post('antrean/updatewaktu');
        return json_decode($response, true);
    }

    public function batalAntrean($data = [])
    {
        $response = $this->post('antrean/batal');
        return json_decode($response, true);
    }

    public function listWaktuTaskId($data = [])
    {
        $response = $this->post('antrean/getlisttask');
        return json_decode($response, true);
    }

    public function dashboardPerTanggal($tanggal, $waktu)
    {
        $response = $this->get('dashboard/waktutunggu/tanggal/'.$tanggal.'/waktu/'.$waktu);
        return json_decode($response, true);
    }

    public function dashboardPerBulan($bulan, $tahun, $waktu)
    {
        $response = $this->get('dashboard/waktutunggu/bulan/'.$bulan.'/tahun/'.$tahun.'/waktu/'.$waktu);
        return json_decode($response, true);
    }
}
<?php
namespace NajmulFaiz\Bpjs\VClaim;
use NajmulFaiz\Bpjs\BpjsService;

class Sep extends BpjsService
{

    public function insertSEP($data = [])
    {
        $response = $this->post('SEP/1.1/insert', $data);
        return json_decode($response, true);
    }
    public function updateSEP($data = [])
    {
        $response = $this->put('SEP/1.1/Update', $data);
        return json_decode($response, true);
    }
    public function deleteSEP($data = [])
    {
        $response = $this->delete('SEP/Delete', $data);
        return json_decode($response, true);
    }

    public function cariSEP($keyword)
    {
        $response = $this->get('SEP/'.$keyword);
        return json_decode($response, true);
    }

    public function insertSEP2($data = [])
    {
        $response = $this->post('SEP/2.0/insert', $data);
        return json_decode($response, true);
    }
    public function updateSEP2($data = [])
    {
        $response = $this->put('SEP/2.0/Update', $data);
        return json_decode($response, true);
    }
    public function deleteSEP2($data = [])
    {
        $response = $this->delete('SEP/2.0/Delete', $data);
        return json_decode($response, true);
    }

    public function suplesiJasaRaharja($noKartu, $tglPelayanan)
    {
        $response = $this->get('sep/JasaRaharja/Suplesi/'.$noKartu.'/tglPelayanan/'.$tglPelayanan);
        return json_decode($response, true);
    }
    public function dataIndukKecelakaan($noKartu)
    {
        $response = $this->get('sep/KllInduk/List/'.$noKartu);
        return json_decode($response, true);
    }

    public function pengajuanPenjaminanSep($data = [])
    {
        $response = $this->post('Sep/pengajuanSEP', $data);
        return json_decode($response, true);
    }
    public function approvalPenjaminanSep($data = [])
    {
        $response = $this->post('Sep/aprovalSEP', $data);
        return json_decode($response, true);
    }

    public function updateTglPlg($data = [])
    {
        $response = $this->put('Sep/updtglplg', $data);
        return json_decode($response, true);
    }
    public function updateTglPlg2($data = [])
    {
        $response = $this->put('Sep/2.0/updtglplg', $data);
        return json_decode($response, true);
    }

    public function inacbgSEP($keyword)
    {
        $response = $this->get('sep/cbg/'.$keyword);
        return json_decode($response, true);
    }

    public function dataSEPInternal($nosep)
    {
        $response = $this->get('SEP/Internal/'.$nosep);
        return json_decode($response, true);
    }
    public function deleteSEPInternal($data = [])
    {
        $response = $this->delete('SEP/Internal/delete', $data);
        return json_decode($response, true);
    }

    public function fingerprint($noKartu, $tglPelayanan)
    {
        $response = $this->get('SEP/FingerPrint/Peserta/'.$noKartu.'/TglPelayanan/'.$tglPelayanan);
        return json_decode($response, true);
    }

    public function fingerprintList($tglPelayanan)
    {
        $response = $this->get('SEP/FingerPrint/List/Peserta/TglPelayanan/'.$tglPelayanan);
        return json_decode($response, true);
    }
}
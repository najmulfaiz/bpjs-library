<?php
namespace NajmulFaiz\Bpjs\VClaim;
use NajmulFaiz\Bpjs\BpjsService;

class Sep extends BpjsService
{

    public function insertSEP($data = [])
    {
        return $this->post('SEP/1.1/insert', $data);
    }
    public function updateSEP($data = [])
    {
        return $this->put('SEP/1.1/Update', $data);
    }
    public function deleteSEP($data = [])
    {
        return $this->delete('SEP/Delete', $data);
    }

    public function cariSEP($keyword)
    {
        return $this->get('SEP/'.$keyword);
    }

    public function insertSEP2($data = [])
    {
        return $this->post('SEP/2.0/insert', $data);
    }
    public function updateSEP2($data = [])
    {
        return $this->put('SEP/2.0/update', $data);
    }
    public function deleteSEP2($data = [])
    {
        return $this->delete('SEP/2.0/delete', $data);
    }

    public function suplesiJasaRaharja($noKartu, $tglPelayanan)
    {
        return $this->get('sep/JasaRaharja/Suplesi/'.$noKartu.'/tglPelayanan/'.$tglPelayanan);
    }

    public function dataIndukKecelakaan($noKartu)
    {
        return $this->get('sep/KllInduk/List/'.$noKartu);
    }

    public function pengajuanPenjaminanSep($data = [])
    {
        return $this->post('Sep/pengajuanSEP', $data);
    }

    public function approvalPenjaminanSep($data = [])
    {
        return $this->post('Sep/aprovalSEP', $data);
    }

    public function updateTglPlg($data = [])
    {
        return $this->put('Sep/updtglplg', $data);
    }

    public function updateTglPlg2($data = [])
    {
        return $this->put('SEP/2.0/updtglplg', $data);
    }

    public function inacbgSEP($keyword)
    {
        return $this->get('sep/cbg/'.$keyword);
    }

    public function dataSEPInternal($nosep)
    {
        return $this->get('SEP/Internal/'.$nosep);
    }

    public function deleteSEPInternal($data = [])
    {
        return $this->delete('SEP/Internal/delete', $data);
    }

    public function fingerprint($noKartu, $tglPelayanan)
    {
        return $this->get('SEP/FingerPrint/Peserta/'.$noKartu.'/TglPelayanan/'.$tglPelayanan);
    }

    public function fingerprintList($tglPelayanan)
    {
        return $this->get('SEP/FingerPrint/List/Peserta/TglPelayanan/'.$tglPelayanan);
        
    }
}
<?php
namespace NajmulFaiz\Bpjs\VClaim;
use NajmulFaiz\Bpjs\BpjsService;

class RencanaKontrol extends BpjsService
{
    public function insertRencanaKontrol($data = [])
    {
        $response = $this->post('RencanaKontrol/insert', $data);
        return json_decode($response, true);
    }

    public function updateRencanaKontrol($data = [])
    {
        $response = $this->put('RencanaKontrol/Update', $data);
        return json_decode($response, true);
    }

    public function deleteRencanaKontrol($data = [])
    {
        $response = $this->delete('RencanaKontrol/Delete', $data);
        return json_decode($response, true);
    }

    public function insertSPRI($data = [])
    {
        $response = $this->post('RencanaKontrol/InsertSPRI', $data);
        return json_decode($response, true);
    }
    
    public function updateSPRI($data = [])
    {
        $response = $this->put('RencanaKontrol/UpdateSPRI', $data);
        return json_decode($response, true);
    }

    public function cariSEP($keyword)
    {
        $response = $this->get('RencanaKontrol/nosep/'.$keyword);
        return json_decode($response, true);
    }

    public function cariByNomorSuratKontrol($keyword)
    {
        $response = $this->get('RencanaKontrol/noSuratKontrol/'.$keyword);
        return json_decode($response, true);
    }

    public function dataNomorSuratKontrol($tglAwal, $tglAkhir, $keyword)
    {
        $response = $this->get('RencanaKontrol/noSuratKontrol/ListRencanaKontrol/tglAwal/'.$tglAwal.'/tglAkhir/'.$tglAkhir.'/filter/'.$keyword);
        return json_decode($response, true);
    }
    
    public function dataPoliSpesialistik($jnsKontrol, $nomor, $tglRencanaKontrol)
    {
        $response = $this->get('RencanaKontrol/ListSpesialistik/JnsKontrol/'.$jnsKontrol.'/nomor/'.$nomor.'/TglRencanaKontrol/'.$tglRencanaKontrol);
        return json_decode($response, true);
    }

    public function dataDokter($jnsKontrol, $kdPoli, $tglRencanaKontrol)
    {
        $response = $this->get('RencanaKontrol/JadwalPraktekDokter/JnsKontrol/'.$jnsKontrol.'/KdPoli/'.$kdPoli.'/TglRencanaKontrol/'.$tglRencanaKontrol);
        return json_decode($response, true);
    }
}
<?php
namespace NajmulFaiz\Bpjs\VClaim;
use NajmulFaiz\Bpjs\BpjsService;

class RencanaKontrol extends BpjsService
{
    public function insertRencanaKontrol($data = [])
    {
        return $this->post('RencanaKontrol/insert', $data);
    }

    public function updateRencanaKontrol($data = [])
    {
        return $this->put('RencanaKontrol/Update', $data);
    }

    public function deleteRencanaKontrol($data = [])
    {
        return $this->delete('RencanaKontrol/Delete', $data);
    }

    public function insertSPRI($data = [])
    {
        return $this->post('RencanaKontrol/InsertSPRI', $data);
    }
    
    public function updateSPRI($data = [])
    {
        return $this->put('RencanaKontrol/UpdateSPRI', $data);
    }

    public function cariSEP($keyword)
    {
        return $this->get('RencanaKontrol/nosep/'.$keyword);
    }

    public function cariByNomorSuratKontrol($keyword)
    {
        return $this->get('RencanaKontrol/noSuratKontrol/'.$keyword);
    }

    public function dataNomorSuratKontrolByNomorKartu($bulan, $tahun, $nokartu, $filter)
    {
        return $this->get('RencanaKontrol/ListRencanaKontrol/Bulan/'.$bulan.'/Tahun/'.$tahun.'/Nokartu/'.$nokartu.'/filter/'.$filter);
    }

    public function dataNomorSuratKontrol($tglAwal, $tglAkhir, $keyword)
    {
        return $this->get('RencanaKontrol/noSuratKontrol/ListRencanaKontrol/tglAwal/'.$tglAwal.'/tglAkhir/'.$tglAkhir.'/filter/'.$keyword);
    }
    
    public function dataPoliSpesialistik($jnsKontrol, $nomor, $tglRencanaKontrol)
    {
        return $this->get('RencanaKontrol/ListSpesialistik/JnsKontrol/'.$jnsKontrol.'/nomor/'.$nomor.'/TglRencanaKontrol/'.$tglRencanaKontrol);
    }

    public function dataDokter($jnsKontrol, $kdPoli, $tglRencanaKontrol)
    {
        return $this->get('RencanaKontrol/JadwalPraktekDokter/JnsKontrol/'.$jnsKontrol.'/KdPoli/'.$kdPoli.'/TglRencanaKontrol/'.$tglRencanaKontrol);
    }
}
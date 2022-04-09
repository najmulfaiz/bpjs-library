<?php
namespace NajmulFaiz\Bpjs\VClaim;

use NajmulFaiz\Bpjs\BpjsService;

class Rujukan extends BpjsService
{
    public function cariByNoRujukan($searchBy, $keyword)
    {
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/'.$keyword;
        } else {
            $url = 'Rujukan/'.$keyword;
        }
        return $this->get($url);
    }

    public function cariByNoKartu($searchBy, $keyword, $multi = false)
    {
        $record = $multi ? 'List/' : '';
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/'.$record.'Peserta/'.$keyword;
        } else {
            $url = 'Rujukan/'.$record.'Peserta/'.$keyword;
        }
        return $this->get($url);
    }

    public function cariByTglRujukan($searchBy, $keyword)
    {
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/TglRujukan/'.$keyword;
        } else {
            $url = 'Rujukan/List/Peserta/'.$keyword;
        }
        return $this->get($url);
    }

    public function insertRujukan($data = [])
    {
        return $this->post('Rujukan/insert', $data);
    }

    public function updateRujukan($data = [])
    {
        return $this->put('Rujukan/update', $data);
    }

    public function deleteRujukan($data = [])
    {
        return $this->delete('Rujukan/delete', $data);
    }

    public function insertRujukanKhusus($data = [])
    {
        return $this->post('Rujukan/Khusus/insert', $data);
    }

    public function deleteRujukanKhusus($data = [])
    {
        return $this->delete('Rujukan/Khusus/delete', $data);
    }

    public function cariRujukanKhusus($bulan, $tahun)
    {
        return $this->get('Rujukan/Khusus/List/Bulan/' . $bulan . '/Tahun/' . $tahun);
    }

    public function insertRujukan2($data = [])
    {
        return $this->post('Rujukan/2.0/insert', $data);
    }

    public function updateRujukan2($data = [])
    {
        return $this->put('Rujukan/2.0/Update', $data);
    }

    public function spesialistikRujukan($ppkRujukan, $tglRujukan)
    {
        return $this->get('Rujukan/ListSpesialistik/PPKRujukan/' . $ppkRujukan . '/TglRujukan/' . $tglRujukan);
    }

    public function sarana($ppkRujukan)
    {
        return $this->get('Rujukan/ListSarana/PPKRujukan/' . $ppkRujukan);
    }

    public function listRujukanKeluarRS($tglMulai, $tglAkhir)
    {
        return $this->get('Rujukan/Keluar/List/tglMulai/' . $tglMulai . '/tglAkhir/' . $tglAkhir);
    }

    public function listRujukanKeluarRSByNoRujukan($noRujukan)
    {
        return $this->get('Rujukan/Keluar/' . $noRujukan);
    }

    public function dataJumlahSepRujukan($jenisRujukan, $noRujukan)
    {
        return $this->get('Rujukan/JumlahSEP/' . $jenisRujukan . '/' . $noRujukan);
    }
}

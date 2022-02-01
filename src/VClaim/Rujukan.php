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
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function cariByNoKartu($searchBy, $keyword, $multi = false)
    {
        $record = $multi ? 'List/' : '';
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/'.$record.'Peserta/'.$keyword;
        } else {
            $url = 'Rujukan/'.$record.'Peserta/'.$keyword;
        }
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function cariByTglRujukan($searchBy, $keyword)
    {
        if ($searchBy == 'RS') {
            $url = 'Rujukan/RS/TglRujukan/'.$keyword;
        } else {
            $url = 'Rujukan/List/Peserta/'.$keyword;
        }
        $response = $this->get($url);
        return json_decode($response, true);
    }

    public function insertRujukan($data = [])
    {
        $response = $this->post('Rujukan/insert', $data);
        return json_decode($response, true);
    }

    public function updateRujukan($data = [])
    {
        $response = $this->put('Rujukan/update', $data);
        return json_decode($response, true);
    }

    public function deleteRujukan($data = [])
    {
        $response = $this->delete('Rujukan/delete', $data);
        return json_decode($response, true);
    }

    public function insertRujukanKhusus($data = [])
    {
        $response = $this->post('Rujukan/Khusus/insert', $data);
        return json_decode($response, true);
    }

    public function deleteRujukanKhusus($data = [])
    {
        $response = $this->delete('Rujukan/Khusus/delete', $data);
        return json_decode($response, true);
    }

    public function cariRujukanKhusus($bulan, $tahun)
    {
        $response = $this->get('Rujukan/Khusus/List/Bulan/' . $bulan . '/Tahun/' . $tahun);
        return json_decode($response, true);
    }

    public function insertRujukan2($data = [])
    {
        $response = $this->post('Rujukan/2.0/insert', $data);
        return json_decode($response, true);
    }

    public function updateRujukan2($data = [])
    {
        $response = $this->put('Rujukan/2.0/update', $data);
        return json_decode($response, true);
    }

    public function spesialistikRujukan($ppkRujukan, $tglRujukan)
    {
        $response = $this->get('Rujukan/ListSpesialistik/PPKRujukan/' . $ppkRujukan . '/TglRujukan/' . $tglRujukan);
        return json_decode($response, true);
    }

    public function sarana($ppkRujukan, $tglRujukan)
    {
        $response = $this->get('Rujukan/ListSarana/PPKRujukan/' . $ppkRujukan);
        return json_decode($response, true);
    }
}

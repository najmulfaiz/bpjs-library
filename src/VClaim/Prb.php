<?php
namespace NajmulFaiz\Bpjs\VClaim;

use NajmulFaiz\Bpjs\BpjsService;

class Prb extends BpjsService
{
    public function insertPRB($data = [])
    {
        $response = $this->post('PRB/insert', $data);
        return json_decode($response, true);
    }

    public function updatePRB($data = [])
    {
        $response = $this->put('PRB/Update', $data);
        return json_decode($response, true);
    }

    public function deletePRB($data = [])
    {
        $response = $this->delete('PRB/Delete', $data);
        return json_decode($response, true);
    }

    public function cariBySRB($noSrb, $noSep)
    {
        $response = $this->get('prb/'.$noSrb.'/nosep/'.$noSep);
        return json_decode($response, true);
    }

    public function cariByTanggal($tglMulai, $tglAkhir)
    {
        $response = $this->get('prb/tglMulai/'.$tglMulai.'/tglAkhir/'.$tglAkhir);
        return json_decode($response, true);
    }
}
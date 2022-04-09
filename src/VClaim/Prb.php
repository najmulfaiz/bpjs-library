<?php
namespace NajmulFaiz\Bpjs\VClaim;

use NajmulFaiz\Bpjs\BpjsService;

class Prb extends BpjsService
{
    public function insertPRB($data = [])
    {
        return $this->post('PRB/insert', $data);
    }

    public function updatePRB($data = [])
    {
        return $this->put('PRB/Update', $data);
    }

    public function deletePRB($data = [])
    {
        return $this->delete('PRB/Delete', $data);
    }

    public function cariBySRB($noSrb, $noSep)
    {
        return $this->get('prb/'.$noSrb.'/nosep/'.$noSep);
    }

    public function cariByTanggal($tglMulai, $tglAkhir)
    {
        return $this->get('prb/tglMulai/'.$tglMulai.'/tglAkhir/'.$tglAkhir);
    }
}
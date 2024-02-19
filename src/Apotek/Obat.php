<?php
namespace NajmulFaiz\Bpjs\Apotek;

use NajmulFaiz\Bpjs\BpjsService;

class Obat extends BpjsService
{
    public function nonRacikan($data = [])
    {
        return $this->post('obatnonracikan/v3/insert', $data);
    }

    public function racikan($data = [])
    {
        return $this->post('obatracikan/v3/insert', $data);
    }
}
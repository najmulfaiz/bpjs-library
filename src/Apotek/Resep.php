<?php
namespace NajmulFaiz\Bpjs\Apotek;

use NajmulFaiz\Bpjs\BpjsService;

class Resep extends BpjsService
{
    public function simpanResep($data = [])
    {
        return $this->post('sjpresep/v3/insert', $data);
    }

    public function hapusResep($data = [])
    {
        return $this->delete('hapusresep', $data);
    }
    
    public function daftarResep($data = [])
    {
        return $this->post('daftarresep', $data);
    }
}
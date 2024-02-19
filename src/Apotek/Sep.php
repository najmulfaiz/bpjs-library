<?php
namespace NajmulFaiz\Bpjs\Apotek;

use NajmulFaiz\Bpjs\BpjsService;

class Sep extends BpjsService
{
    public function kunjunganBySep($noSep)
    {
        return $this->get('sep/'.$noSep);
    }
}
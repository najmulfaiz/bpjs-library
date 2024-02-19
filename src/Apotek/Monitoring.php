<?php
namespace NajmulFaiz\Bpjs\Apotek;

use NajmulFaiz\Bpjs\BpjsService;

class Monitoring extends BpjsService
{
    public function dataKlaim($bulan, $tahun, $jns_obat, $status)
    {
        return $this->get('monitoring/klaim/'.$bulan.'/'.$tahun.'/'.$jns_obat.'/'.$status);
    }
}
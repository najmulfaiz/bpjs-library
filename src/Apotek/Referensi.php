<?php
namespace NajmulFaiz\Bpjs\Apotek;

use NajmulFaiz\Bpjs\BpjsService;

class Referensi extends BpjsService
{
    public function dpho()
    {
        return $this->get('referensi/dpho');
    }

    public function poli($keyword)
    {
        return $this->get('referensi/poli/'.$keyword);
    }

    public function faskes($jns_faskes = null, $nm_faskes = null)
    {
        return $this->get('referensi/ppk/'.$jns_faskes.'/'.$nm_faskes);
    }

    public function settingApotek($keyword)
    {
        return $this->get('referensi/settingppk/read/'.$keyword);
    }

    public function spesialistik()
    {
        return $this->get('referensi/spesialistik');
    }

    public function obat($kd_jns_obat = null, $tgl_resep = null, $filter_pencarian = null)
    {
        return $this->get('referensi/obat/'.$kd_jns_obat.'/'.$tgl_resep.'/'.$filter_pencarian);
    }
}
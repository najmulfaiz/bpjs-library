<?php
namespace NajmulFaiz\Bpjs\VClaim;

use NajmulFaiz\Bpjs\BpjsService;

class Referensi extends BpjsService
{

    public function diagnosa($keyword)
    {
        return $this->get('referensi/diagnosa/'.$keyword);
    }

    public function poli($keyword)
    {
        return $this->get('referensi/poli/'.$keyword);
    }

    public function faskes($kd_faskes = null, $jns_faskes = null)
    {
        return $this->get('referensi/faskes/'.$kd_faskes.'/'.$jns_faskes);
    }

    public function dokterDpjp($jnsPelayanan, $tglPelayanan, $spesialis)
    {
        return $this->get('referensi/dokter/pelayanan/'.$jnsPelayanan.'/tglPelayanan/'.$tglPelayanan.'/Spesialis/'.$spesialis);
    }

    public function propinsi()
    {
        return $this->get('referensi/propinsi');
    }

    public function kabupaten($kdPropinsi)
    {
        return $this->get('referensi/kabupaten/propinsi/'.$kdPropinsi);
    }

    public function kecamatan($kdKabupaten)
    {
        return $this->get('referensi/kecamatan/kabupaten/'.$kdKabupaten);
    }

    public function procedure($keyword)
    {
        return $this->get('referensi/procedure/'.$keyword);
    }

    public function kelasRawat()
    {
        return $this->get('referensi/kelasrawat');
    }

    public function dokter($keyword)
    {
        return $this->get('referensi/dokter/'.$keyword);
    }

    public function spesialistik()
    {
        return $this->get('referensi/spesialistik');
    }

    public function ruangrawat()
    {
        return $this->get('referensi/ruangrawat');
    }

    public function carakeluar()
    {
        return $this->get('referensi/carakeluar');
    }

    public function pascapulang()
    {
        return $this->get('referensi/pascapulang');
    }

    public function diagnosaProgramPRB()
    {
        return $this->get('referensi/diagnosaprb');
    }

    public function obatGenerikProgramPRB($keyword)
    {
        return $this->get('referensi/obatprb/'.$keyword);
    }
}
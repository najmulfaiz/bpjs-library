<?php
namespace NajmulFaiz\Bpjs\Apotek;

use NajmulFaiz\Bpjs\BpjsService;

class PelayananObat extends BpjsService
{
    public function hapusPelayananObat($data = [])
    {
        return $this->delete('pelayanan/obat/hapus', $data);
    }
    
    public function daftarPelayananObat($nosep)
    {
        return $this->get('obat/daftar/'.$nosep);
    }

    public function riwayatPelayananObat($tglAwal = null, $tglAkhir = null, $noKartu = null)
    {
        return $this->get('riwayatobat/'.$tglAwal.'/'.$tglAkhir.'/'.$noKartu);
    }
}
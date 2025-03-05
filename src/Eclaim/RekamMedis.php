<?php
namespace NajmulFaiz\Bpjs\Eclaim;
use NajmulFaiz\Bpjs\BpjsService;

class RekamMedis extends BpjsService
{
    public function insert($data = [])
    {
        return $this->postEclaim('eclaim/rekammedis/insert', $data);
    }

    public function encrypt($data = [])
    {
        $compressedData = gzencode(json_encode($data), 9);
        
        $encrypt_method = 'AES-256-CBC';
        $encrypt_key = $this->getEncryptKey();

        $key_hash = hex2bin(hash('sha256', $encrypt_key));
        $iv = substr(hex2bin(hash('sha256', $encrypt_key)), 0, 16);

        return openssl_encrypt(base64_encode($compressedData), $encrypt_method, $key_hash, 0, $iv);
    }
}
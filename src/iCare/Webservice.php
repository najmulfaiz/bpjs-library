<?php

namespace NajmulFaiz\Bpjs\iCare;
use NajmulFaiz\Bpjs\BpjsService;

class Webservice extends BpjsService
{
    public function fkrtl($data = [])
    {
        return $this->postiCare('api/rs/validate', $data, ['Content-Type' => 'application/json']);
    }

    public function fktp($data = [])
    {
        return $this->postiCare('api/pcare/validate', $data);
    }
}
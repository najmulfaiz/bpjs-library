<?php

require 'config.php';

header('Content-type: Application/Json');

$vclaim = new NajmulFaiz\Bpjs\VClaim\Peserta($icare_conf);
$peserta = $vclaim->getByNIK('350718210997000', date('Y-m-d'));

die(json_encode($peserta));

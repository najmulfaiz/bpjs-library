<?php

require_once __DIR__.'/../vendor/autoload.php';

//use your own bpjs config
$antrean_conf = [
    'cons_id'      => '',
    'secret_key'   => '',
    'user_key'     => '',
    'base_url'     => '',
    'service_name' => 'v'
];

$vclaim_conf = [
    'cons_id'      => '',
    'secret_key'   => '',
    'user_key'     => '',
    'base_url'     => '',
    'service_name' => 'v'
];

//use antrean serivce
$antrean = new NajmulFaiz\Bpjs\Antrean\WSBpjs($antrean_conf);

echo '<pre>';
echo json_encode($antrean->dashboardPerTanggal('2022-02-03', 'server'));
echo '</pre>';

//use antrean serivce
$vclaim = new NajmulFaiz\Bpjs\VClaim\Referensi($vclaim_conf);

echo '<pre>';
echo json_encode($vclaim->poli('INT'));
echo '</pre>';
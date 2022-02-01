<?php

require_once __DIR__.'/../vendor/autoload.php';

//use your own bpjs config
$antrean_conf = [
    'cons_id'      => '',
    'secret_key'   => '',
    'user_key'     => '',
    'base_url'     => '',
    'service_name' => ''
];

//use referensi serivce
$referensi = new NajmulFaiz\Bpjs\Antrean\WSBpjs($antrean_conf);
echo '<pre>';
echo json_encode($referensi->refPoli());
echo '</pre>';
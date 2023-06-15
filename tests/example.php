<?php

require 'config.php';

header('Content-type: Application/Json');

$antrean = new NajmulFaiz\Bpjs\Antrean\WSBpjs($antrean_conf);

echo json_encode($antrean->antreanBelumDilayaniPerPoliPerDokterPerHariPerJamPraktek('', '', '', ''));

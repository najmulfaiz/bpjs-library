<?php

require 'config.php';

header('Content-type: Application/Json');

$antrean = new NajmulFaiz\Bpjs\Antrean\WSBpjs($antrean_conf);

echo '<pre>';
echo json_encode($antrean->dashboardPerBulan('03', '2022', 'server'));
echo '</pre>';

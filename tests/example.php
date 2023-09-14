<?php

require 'config.php';

header('Content-type: Application/Json');

$icare = new NajmulFaiz\Bpjs\iCare\Webservice($icare_conf);

var_dump($icare->fkrtl([
  "param" => null,
  "kodedokter" => null
]));

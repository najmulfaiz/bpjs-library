# BPJS Kesehatan Indonesia
PHP package to access BPJS Kesehatan API :ambulance:.
This package is a wrapper of BPJS Aplicares, VClaim, Antrean Web Service
https://dvlp.bpjs-kesehatan.go.id:8888/trust-mark

#### Installation :fire:

`composer require najmulfaiz/bpjs`

#### Example Usage :confetti_ball:
```php
//use your own bpjs config
$vclaim_conf = [
    'cons_id' => 'XXX',
    'secret_key' => 'XXX',
    'user_key' => 'XXX'
    'base_url' => 'XXX',
    'service_name' => 'XXX'
];

// use Referensi service
$referensi = new NajmulFaiz\Bpjs\VClaim\Referensi($vclaim_conf);
var_dump($referensi->diagnosa('A00'));
```

#### Supported Services (WIP) :rocket:

- [x] Aplicares
- [x] LPK
- [x] Monitoring
- [x] Peserta
- [x] PRB
- [x] Referensi
- [x] Rencana Kontrol
- [x] Rujukan
- [x] SEP
- [x] Antrean RS WS BPJS

#### BASED ON
https://github.com/nsulistiyawan/bpjs

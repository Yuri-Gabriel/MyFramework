<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;

#[Controller]
class ViewController {
    #[Mapping("/info")]
    public function pao() {
        echo "alksdjnlas<br>";
    }

    #[Mapping('/pindamonhangaba')]
    public function pindamonhangaba(string $cookies) {
        echo "pindamonhangaba - $cookies";
    }
    
}
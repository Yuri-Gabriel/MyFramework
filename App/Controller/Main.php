<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Annotations\Instantiate;


#[Controller("/")]
class Main {
    #[Instantiate]
    private Teste $teste;

    #[Mapping("/")]
    public function main() {
        //$this->teste->main();
    }
}
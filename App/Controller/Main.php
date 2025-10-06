<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Annotations\Instanciate;


#[Controller("/")]
class Main {
    #[Instanciate]
    private Teste $teste;

    #[Mapping("/")]
    public function main() {
        $this->teste->main();
    }
}
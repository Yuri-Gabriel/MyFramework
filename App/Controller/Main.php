<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Annotations\Instantiate;
use App\Model\Pessoa;

#[Controller("/")]
class Main {
    #[Instantiate]
    private Pessoa $pessoa;

    #[Mapping("/")]
    public function main() {

        $this->pessoa->repository->delete();
    }
}
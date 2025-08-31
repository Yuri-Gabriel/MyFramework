<?php

namespace App\Controller\Relatorio;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Mapping;

#[Controller("/relatorio")]
class RelatorioController {
    #[Mapping("/usuarios")]
    public function pao(): void {
        echo "Relatorio";
    }
}

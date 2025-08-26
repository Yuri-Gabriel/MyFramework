<?php

namespace App\Controller\Relatorio;

use Framework\Libs\Http\Annotations\Mapping;
use Framework\Libs\Http\Annotations\Controller;

#[Controller("/relatorio")]
class RelatorioController {
    #[Mapping("/usuarios")]
    public function pao(): void {
        echo "Relatorio";
    }

    
}

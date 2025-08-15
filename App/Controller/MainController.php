<?php

namespace App\Controller;

use Framework\Libs\Http\Mapping;
use Framework\Libs\Engine\Render;

class MainController {
    #[Mapping("/pao")]
    public function pao() {
        echo "pao";
    }

    #[Mapping("/")]
    public function main(): void {
        Render::render("index_view");
    }

    #[Mapping("/teste", "GET")]
    public function teste(string $txt, string $msg) {
        var_dump([
            "txt - inside" => $txt,
            "msg - inside" => $msg
        ]);
    }
}
<?php

namespace App\Controller;

use Framework\Libs\Http\Mapping;
use Framework\Libs\Engine\Render;
use Framework\Libs\Http\Request;

class MainController {
    #[Mapping("/post", "POST")]
    public function pao(Request $request, int $num): void {
        print_r($request->getJsonData());
        print_r($num);
    }

    #[Mapping("/{teste }/{pao }")]
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

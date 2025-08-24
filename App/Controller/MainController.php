<?php

namespace App\Controller;

use App\Middleware\Middle;
use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Interceptor;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Engine\Render;
use Framework\Libs\Http\HTTP_STATUS;
use Framework\Libs\Http\Request;
use Framework\Libs\Http\Response;

#[Controller]
#[Interceptor(new Middle)] // Passar qual classe será o middleware, Middle::class, não uma instancia da classe Middleware
class MainController {
    #[Mapping("/post", )]
    public function pao(): void {
        echo "passou <br>";
    }

    #[Mapping("/{teste}/{pao}")]
    public function main(): void {
        Render::render("index_view");
    }

    #[Mapping("/teste", "POST")]
    public function teste(string $txt, string $msg) {
        (new Response(HTTP_STATUS::OK, [
            "txt - inside" => $txt,
            "msg - inside" => $msg
        ]))->dispatch();
    }
}

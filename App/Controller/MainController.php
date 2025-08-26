<?php

namespace App\Controller;

use App\Middleware\B2;
use App\Middleware\Barragem;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Interceptor;
use Framework\Libs\Annotations\Mapping;

use Framework\Libs\Http\Request;

#[Controller("/teste")]
#[Interceptor(Barragem::class)]
class MainController {
    #[Mapping("/post", "POST")]
    public function pao(Request $request, int $num): void {
        print_r($request->getJsonData());
        print_r($num);
    }

    #[Mapping("/")]
    #[Interceptor(B2::class)]
    public function pao2(): void {
        echo "<br>rota /teste";
    }

    #[Mapping("/{v1}/{v2}")]
    public function main(string $v1, string $v2): void {
        print_r([
            "v1" => $v1,
            "v2" => $v2
        ]);
    }

    #[Mapping("/{p1}/edit")]
    public function main2(string $p1): void {
        print_r([
            "p1" => $p1
        ]);
        //Render::render("index_view");
    }

    #[Mapping("/{oi}", "GET")]
    public function teste(string $oi) {
        var_dump([
            "oi" => $oi
        ]);
    }
}

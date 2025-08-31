<?php

namespace App\Controller;

use App\Middleware\Barragem;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Engine\Render;
use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Interceptors;

#[Controller]
class ViewController {
    #[Mapping("/info")]
    #[Interceptors([
        Barragem::class
    ])]
    public function pao() {
        //Render::render("info_view");
        echo "Passou";
    }

    #[Mapping('/pindamonhangaba')]
    public function pindamonhangaba(string $cookies) {
        echo "pindamonhangaba - $cookies";
    }

    #[Mapping('/pindamonhangabaV2')]
    public function pindamonhangabaV2() {
        Render::render('adalberto');
    }
    
}
<?php

namespace App\Controller;

use Framework\Libs\Http\Mapping;
use Framework\Libs\Engine\Render;

class ViewController {
    #[Mapping("/info")]
    public function pao() {
        Render::render("info_view");
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
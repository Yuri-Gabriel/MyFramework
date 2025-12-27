<?php

namespace App\Controller;

use Framework\Libs\Annotations\Controller;
use Framework\Libs\Annotations\Instantiate;
use Framework\Libs\Annotations\Mapping;
use Framework\Libs\Engine\Render;
use Framework\Libs\Http\Request;

#[Controller]
class Main {

    #[Instantiate()]
    public Request $request;

    #[Mapping("/")]
    public function main() {
        Render::render("index_view");
    }

    #[Mapping('/{name}')]
    public function getParams($name) {
        echo "name = $name";
    }

    #[Mapping('/param/get')]
    public function getParamsURI($name, $age) {
        echo "name = $name; age = $age";
    }

    #[Mapping('/sendJson', "POST")]
    public function send() {
        var_dump(
            $this->request->body
        );
    }
}
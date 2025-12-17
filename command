<?php

use Framework\Kernel\Command\Input;

require_once './vendor/autoload.php';

(new Input($argv, $argc))->run();
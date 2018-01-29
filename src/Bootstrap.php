<?php declare(strict_types=1);

use Tracy\Debugger;

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

Debugger::enable(Debugger::DEVELOPMENT);

echo 'Hello from the bootstrap file :-)';



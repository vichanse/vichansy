<?php declare(strict_types=1);

use Tracy\Debugger;

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

Debugger::enable(Debugger::DEVELOPMENT);

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$content = 'Hello ' . $request->get('name', 'visitor');

$response = new \Symfony\Component\HttpFoundation\Response($content);
$response->prepare($request);
$response->send();



<?php declare(strict_types=1);

use Tracy\Debugger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vichansy\FrontPage\Presentation\FrontPageController;

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

Debugger::enable(Debugger::DEVELOPMENT);

$request = Request::createFromGlobals();

$controller = new FrontPageController();
$response = $controller->show($request);

if(!$response instanceof Response) {
    throw new \Exception('Controller method must return a Response object');
}


$response->prepare($request);
$response->send();



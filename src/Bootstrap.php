<?php declare(strict_types=1);

/*use Tracy\Debugger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vichansy\FrontPage\Presentation\FrontPageController;*/

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

\Tracy\Debugger::enable();

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$controller = new \Vichansy\FrontPage\Presentation\FrontPageController();

$response = $controller->show($request);

if(!$response instanceof \Symfony\Component\HttpFoundation\Response) {
    throw new \Exception('Controller method must return a Response object');
}


$response->prepare($request);
$response->send();



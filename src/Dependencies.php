<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 02/02/2018
 * Time: 05:20
 */

use Auryn\Injector;
use Vichansy\Framework\Rendering\TemplateRenderer;
use Vichansy\Framework\Rendering\TwigTemplateRendererFactory;
use Vichansy\Framework\Rendering\TemplateDirectory;
use Vichansy\FrontPage\Application\SubmissionsQuery;
use Vichansy\FrontPage\Infrastructure\MockSubmissionsQuery;
use Doctrine\DBAL\Connection;
use Vichansy\Framework\Dbal\ConnectionFactory;
use Vichansy\Framework\Dbal\DatabaseUrl;

$injector = new Injector();



$injector->delegate(
    TemplateRenderer::class,
    function () use ($injector): TemplateRenderer {
        $factory = $injector->make(TwigTemplateRendererFactory::class);
        return $factory->create(); }
);

$injector->define(TemplateDirectory::class, [':rootDirectory' => ROOT_DIR]);

$injector->alias(SubmissionsQuery::class, MockSubmissionsQuery::class);
$injector->share(SubmissionsQuery::class);

//DB
$injector->define(
    DatabaseUrl::class,
    [':url' => 'sqlite:///' . ROOT_DIR . '/storage/db.sqlite3']
);

$injector->delegate(Connection::class, function () use ($injector): Connection {
    $factory = $injector->make(ConnectionFactory::class);
    return $factory->create();
});

$injector->share(Connection::class);
return $injector;
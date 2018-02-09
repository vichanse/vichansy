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
//use Vichansy\FrontPage\Infrastructure\MockSubmissionsQuery;
use Doctrine\DBAL\Connection;
use Vichansy\Framework\Dbal\ConnectionFactory;
use Vichansy\Framework\Dbal\DatabaseUrl;
use Vichansy\FrontPage\Infrastructure\DbalSubmissionQuery;
use Vichansy\Framework\Csrf\TokenStorage;
use Vichansy\Framework\Csrf\SymfonySessionTokenStorage;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Vichansy\Submission\Domain\SubmissionRepository;
use Vichansy\Submission\Infrastructure\DbalSubmissionRepository;
use Vichansy\User\Domain\UserRepository;
use Vichansy\User\Infrastructure\DbalUserRepository;
use Vichansy\User\Application\NicknameTakenQuery;
use Vichansy\User\Infrastructure\DbalNicknameTakenQuery;
use Vichansy\Framework\Rbac\User;
use Vichansy\Framework\Rbac\SymfonySessionCurrentUserFactory;

$injector = new Injector();


$injector->delegate(
    TemplateRenderer::class,
    function () use ($injector): TemplateRenderer {
        $factory = $injector->make(TwigTemplateRendererFactory::class);

        return $factory->create();
    }
);

$injector->define(TemplateDirectory::class, [':rootDirectory' => ROOT_DIR]);

//$injector->alias(SubmissionsQuery::class, MockSubmissionsQuery::class);
$injector->alias(SubmissionsQuery::class, DbalSubmissionQuery::class);
$injector->share(SubmissionsQuery::class);

//DB
$injector->define(
    DatabaseUrl::class,
    [':url' => 'sqlite:///'.ROOT_DIR.'/storage/db.sqlite3']
);

$injector->delegate(
    Connection::class,
    function () use ($injector): Connection {
        $factory = $injector->make(ConnectionFactory::class);

        return $factory->create();
    }
);

$injector->share(Connection::class);

//CSRF & Session
$injector->alias(TokenStorage::class, SymfonySessionTokenStorage::class);
$injector->alias(SessionInterface::class, Session::class);
$injector->alias(SubmissionRepository::class, DbalSubmissionRepository::class);

//User
$injector->alias(UserRepository::class, DbalUserRepository::class);
$injector->alias(NicknameTakenQuery::class, DbalNicknameTakenQuery::class);

//Authorization
$injector->delegate(
    User::class,
    function () use ($injector): User {
        $factory = $injector->make(SymfonySessionCurrentUserFactory::class);

        return $factory->create();
    }
);

return $injector;
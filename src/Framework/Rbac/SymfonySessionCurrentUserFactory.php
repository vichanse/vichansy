<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:43
 */

namespace Vichansy\Framework\Rbac;

use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Session\Session;
use Vichansy\Framework\Rbac\Role\Author;

final class SymfonySessionCurrentUserFactory
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function create(): User
    {
        if (!$this->session->has('userId')) {
            return new Guest();
        }

        return new AuthenticatedUser(
            Uuid::fromString($this->session->get('userId')), [new Author()]
        );
    }
}
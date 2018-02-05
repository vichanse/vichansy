<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 05/02/2018
 * Time: 06:11
 */

namespace Vichansy\Framework\Csrf;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class SymfonySessionTokenStorage implements TokenStorage
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function store(string $key, Token $token): void
    {
        $this->session->set($key, $token->toString());
    }

    public function retrieve(string $key): ?Token
    {
        $tokenValue = $this->session->get($key);
        if ($tokenValue === null) {
            return null;
        }
        return new Token($tokenValue);
    }
}
<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 05/02/2018
 * Time: 06:14
 */

namespace Vichansy\Framework\Csrf;


final class StoredTokenReader
{
    private $tokenStorage;

    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    public function read(string $key): Token
    {
        $token = $this->tokenStorage->retrieve($key);
        if ($token !== null) {
            return $token;
        }

        $token = Token::generate();
        $this->tokenStorage->store($key, $token);

        return $token;
    }
}
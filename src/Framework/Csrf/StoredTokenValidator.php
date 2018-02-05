<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 05/02/2018
 * Time: 06:30
 */

namespace Vichansy\Framework\Csrf;


final class StoredTokenValidator
{
    private $tokenStorage;

    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    public function validate(string $key, Token $token): bool
    {
        $storedToken = $this->tokenStorage->retrieve($key);
        if ($storedToken === null) {
            return false;
        }
        return $token->equals($storedToken); }
}
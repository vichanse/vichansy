<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 05/02/2018
 * Time: 06:07
 */

namespace Vichansy\Framework\Csrf;


final class Token
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function toString(): string
    {
        return $this->token;
    }

    public static function generate(): Token
    {
        $token = bin2hex(random_bytes(256));
        return new Token($token);
    }

    public function equals(Token $token): bool
    {
        return ($this->token === $token->toString());
    }
}
<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 05/02/2018
 * Time: 06:10
 */

namespace Vichansy\Framework\Csrf;


interface TokenStorage
{
    public function store(string $key, Token $token): void;
    public function retrieve(string $key): ?Token;
}
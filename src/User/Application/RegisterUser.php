<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 05:17
 */

namespace Vichansy\User\Application;


final class RegisterUser
{
    private $nickname; private $password;
    public function __construct(string $nickname, string $password)
    {
        $this->nickname = $nickname;
        $this->password = $password;
    }
    public function getNickname(): string
    {
        return $this->nickname;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
}
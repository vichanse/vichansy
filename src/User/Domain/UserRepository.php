<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 05:15
 */

namespace Vichansy\User\Domain;


interface UserRepository
{
    public function add(User $user): void;
}
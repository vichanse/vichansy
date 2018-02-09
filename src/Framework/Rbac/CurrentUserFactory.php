<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:42
 */

namespace Vichansy\Framework\Rbac;


interface CurrentUserFactory
{
    public function create(): User;
}
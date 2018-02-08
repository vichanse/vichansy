<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 06:01
 */

namespace Vichansy\User\Application;


interface NicknameTakenQuery
{
    public function execute(string $nickname): bool;
}
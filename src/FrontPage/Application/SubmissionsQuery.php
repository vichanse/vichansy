<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 02/02/2018
 * Time: 06:38
 */

namespace Vichansy\FrontPage\Application;


interface SubmissionsQuery
{
    /** @return Submission[] */
    public function execute(): array ;
}
<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 06/02/2018
 * Time: 05:55
 */

namespace Vichansy\Submission\Domain;


interface SubmissionRepository
{
    public function add(Submission $submission): void;
}
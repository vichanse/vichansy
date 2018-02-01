<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 01/02/2018
 * Time: 05:50
 */
return [
    [
        'GET',
        '/',
        'Vichansy\FrontPage\Presentation\FrontPageController#show'
    ],
    [
        'GET',
        '/submit',
        'Vichansy\Submission\Presentation\SubmissionController#show'
    ],
];


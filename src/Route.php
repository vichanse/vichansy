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
    [
        'POST',
        '/submit',
        'Vichansy\Submission\Presentation\SubmissionController#submit'
    ],
    [
        'GET',
        '/register',
        'Vichansy\User\Presentation\RegistrationController#show'
    ],
    [
        'POST',
        '/register',
        'Vichansy\User\Presentation\RegistrationController#register'
    ],
];


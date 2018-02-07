<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 07/02/2018
 * Time: 06:15
 */

namespace Vichansy\Submission\Presentation;

use Vichansy\Framework\Csrf\StoredTokenValidator;
use Symfony\Component\HttpFoundation\Request;


final class SubmissionFormFactory
{
    private $storedTokenValidator;
    public function __construct(StoredTokenValidator $storedTokenValidator)
    {
        $this->storedTokenValidator = $storedTokenValidator;
    }

    public function createFromRequest(Request $request): SubmissionForm
    {
        return new SubmissionForm(
            $this->storedTokenValidator,
            (string)$request->get('token'),
            (string)$request->get('title'),
            (string)$request->get('url')
        );
    }
}
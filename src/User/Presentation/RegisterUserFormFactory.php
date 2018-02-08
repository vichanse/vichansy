<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 05:32
 */

namespace Vichansy\User\Presentation;

use Vichansy\Framework\Csrf\StoredTokenValidator;
use Symfony\Component\HttpFoundation\Request;
use Vichansy\User\Application\NicknameTakenQuery;

final class RegisterUserFormFactory
{
    private $storedTokenValidator;
    private $nicknameTakenQuery;

    public function __construct(
        StoredTokenValidator $storedTokenValidator,
        NicknameTakenQuery $nicknameTakenQuery
    ) {
        $this->storedTokenValidator = $storedTokenValidator;
        $this->nicknameTakenQuery = $nicknameTakenQuery;
    }
    public function createFromRequest(Request $request): RegisterUserForm
    {
        return new RegisterUserForm(
            $this->storedTokenValidator,
            $this->nicknameTakenQuery,
            (string)$request->get('token'),
            (string)$request->get('nickname'),
            (string)$request->get('password')
        );
    }
}
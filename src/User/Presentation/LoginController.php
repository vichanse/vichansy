<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 04:41
 */

namespace Vichansy\User\Presentation;

use Vichansy\Framework\Csrf\StoredTokenValidator;
use Vichansy\Framework\Rendering\TemplateRenderer;
use Vichansy\User\Application\LogInHandler;
use Symfony\Component\HttpFoundation\Response;
use Vichansy\Framework\Csrf\Token;
use Vichansy\User\Application\LogIn;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

final class LoginController
{
    private $templateRenderer;
    private $storedTokenValidator;
    private $session;
    private $logInHandler;

    public function __construct(
        TemplateRenderer $templateRenderer,
        StoredTokenValidator $storedTokenValidator,
        Session $session,
        LogInHandler $logInHandler
    ) {
        $this->templateRenderer = $templateRenderer;
        $this->storedTokenValidator = $storedTokenValidator;
        $this->session = $session;
        $this->logInHandler = $logInHandler;
    }

    public function show(): Response
    {
        $content = $this->templateRenderer->render('Login.html.twig');

        return new Response($content);
    }

    public function logIn(Request $request): Response
    {
        if (!$this->storedTokenValidator->validate(
            'login',
            new Token((string)$request->get('token'))
        )) {
            $this->session->getFlashBag()->add('errors', 'Invalid token');

            return new RedirectResponse('/login');
        }
        $this->logInHandler->handle(
            new LogIn(
                (string)$request->get('nickname'), (string)$request->get('password')
            )
        );
// validate that the user was logged in
        $this->session->getFlashBag()->add('success', 'You were logged in.');

        return new RedirectResponse('/');
    }
}
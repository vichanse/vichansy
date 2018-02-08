<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 05:22
 */

namespace Vichansy\User\Presentation;

use Symfony\Component\HttpFoundation\Session\Session;
use Vichansy\Framework\Rendering\TemplateRenderer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Vichansy\User\Application\RegisterUserHandler;

final class RegistrationController
{
    private $templateRenderer;
    private $registerUserFormFactory;
    private $session;
    private $registerUserHandler;

    public function __construct(
        TemplateRenderer $templateRenderer,
        RegisterUserFormFactory $registerUserFormFactory,
        Session $session,
        RegisterUserHandler $registerUserHandler
    ) {
        $this->templateRenderer = $templateRenderer;
        $this->registerUserFormFactory = $registerUserFormFactory;
        $this->session = $session;
        $this->registerUserHandler = $registerUserHandler;
    }
    public function show(): Response
    {
        $content = $this->templateRenderer->render('Registration.html.twig');
        return new Response($content);
    }
    public function register(Request $request): Response
    {
        $response = new RedirectResponse('/register');
        $form = $this->registerUserFormFactory->createFromRequest($request);

        if ($form->hasValidationErrors()) {
            foreach ($form->getValidationErrors() as $errorMessage) {
                $this->session->getFlashBag()->add('errors', $errorMessage);
            }
            return $response;
        }

        $this->registerUserHandler->handle($form->toCommand());

        $this->session->getFlashBag()->add( 'success',
            'Your account was created. You can now log in.'
        );
        return $response; }
}
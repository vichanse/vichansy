<?php declare(strict_types=1);

namespace Vichansy\Submission\Presentation;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vichansy\Framework\Csrf\StoredTokenValidator;
use Vichansy\Framework\Rendering\TemplateRenderer;
use Vichansy\Framework\Csrf\Token;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Vichansy\Submission\Application\SubmitLink;
use Vichansy\Submission\Application\SubmitLinkHandler;

final class SubmissionController
{
    private $templateRenderer;
    private $storedTokenValidator;
    private $session;
    private $submitHandler;

    public function __construct(
        TemplateRenderer $templateRenderer,
        StoredTokenValidator $storedTokenValidator,
        Session $session,
        SubmitLinkHandler $submitLinkHandler
    )
    {
        $this->templateRenderer = $templateRenderer;
        $this->storedTokenValidator = $storedTokenValidator;
        $this->session = $session;
        $this->submitLinkHandler = $submitLinkHandler;
    }

    public function show(): Response
    {
        $content = $this->templateRenderer->render('Submission.html.twig');
        return new Response($content);
    }

    public function submit(Request $request): Response
    {
        $response = new RedirectResponse('/');

        if (!$this->storedTokenValidator->validate(
            'submission',
            new Token((string)$request->get('token'))
        )) {
            $this->session->getFlashBag()->add('errors', 'Invalid token');
            return $response;
        }

        $this->submitLinkHandler->handle(new SubmitLink(
            $request->get('url'),
            $request->get('title')
        ));

        $this->session->getFlashBag()->add(
            'success',
            'Your URL was submitted successfully'
        );
        return $response;
    }
}
<?php declare(strict_types=1);

namespace Vichansy\Submission\Presentation;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vichansy\Framework\Csrf\StoredTokenValidator;
use Vichansy\Framework\Rendering\TemplateRenderer;


final class SubmissionController
{
    private $templateRenderer;
    private $storedTokenValidator;

    public function __construct(
        TemplateRenderer $templateRenderer,
        StoredTokenValidator $storedTokenValidator
    )
    {
        $this->templateRenderer = $templateRenderer;
        $this->storedTokenValidator = $storedTokenValidator;
    }

    public function show(): Response
    {
        $content = $this->templateRenderer->render('Submission.html.twig');
        return new Response($content);
    }

    public function submit(Request $request): Response
    {
        $content = $request->get('title') . ' - ' . $request->get('url');
        return new Response($content);
    }
}
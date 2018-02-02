<?php

namespace Vichansy\FrontPage\Presentation;

use Symfony\Component\HttpFoundation\Response;
use Vichansy\Framework\Rendering\TemplateRenderer;
use Vichansy\FrontPage\Application\SubmissionsQuery;

final class FrontPageController
{
    private $templateRenderer;
    private $submissionQuery;

    public function __construct(
        TemplateRenderer $templateRenderer,
        SubmissionsQuery $submissionQuery
    ) {
        $this->templateRenderer = $templateRenderer;
        $this->submissionQuery = $submissionQuery;
    }
    public function show(): Response
    {
        $content = $this->templateRenderer->render('FrontPage.html.twig', [
            'submissions' => $this->submissionQuery->execute(),
        ]);
        return new Response($content);
    }
}
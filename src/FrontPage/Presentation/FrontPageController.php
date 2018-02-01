<?php

namespace Vichansy\FrontPage\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vichansy\Framework\Rendering\TemplateRenderer;

final class FrontPageController
{
    private $tempalteRenderer;

    public function __construct(TemplateRenderer $templateRenderer)
    {
        $this->tempalteRenderer = $templateRenderer;
    }
    public function show(Request $request): Response
    {
        $content = 'Hello, ' . $request->get('name', 'visitor');
        return new Response($content);
    }
}
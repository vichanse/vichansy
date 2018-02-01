<?php
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 01/02/2018
 * Time: 06:23
 */

namespace Vichansy\Framework\Rendering;

use Twig_Environment;


final class TwigTemplateRenderer implements TemplateRenderer
{
    private $twigEnvironement;

    public function __construct(Twig_Environment $twigEnvironment)
    {
        $this->twigEnvironement = $twigEnvironment;
    }

    public function render(string $template, array $data = []): string
    {
        return $this->twigEnvironement->render($template, $data);
    }


}
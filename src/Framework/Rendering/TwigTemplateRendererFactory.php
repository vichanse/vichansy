<?php
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 01/02/2018
 * Time: 06:27
 */

namespace Vichansy\Framework\Rendering;

use Twig_Loader_Filesystem;
use Twig_Environment;

final class TwigTemplateRendererFactory
{
    public function create(): TwigTemplateRenderer
    {
        $loader = new Twig_Loader_Filesystem([]);
        $twigEnvironment = new Twig_Environment($loader);
        return new twigTemplateRenderer($twigEnvironment);
    }

}
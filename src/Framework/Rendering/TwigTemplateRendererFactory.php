<?php
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 01/02/2018
 * Time: 06:27
 */

namespace Vichansy\Framework\Rendering;

use Vichansy\Framework\Csrf\StoredTokenReader;
use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Function;

final class TwigTemplateRendererFactory
{
    private $templateDirectory;
    private $storedTokenReader;

    public function __construct(
        TemplateDirectory $templateDirectory,
        StoredTokenReader $storedTokenReader
    )
    {
        $this->templateDirectory = $templateDirectory;
        $this->storedTokenReader = $storedTokenReader;
    }

    public function create(): TwigTemplateRenderer
    {
        $loader = new Twig_Loader_Filesystem([
            $this->templateDirectory->toString(),
        ]);
        $twigEnvironment = new Twig_Environment($loader);

        $twigEnvironment->addFunction(
            new Twig_Function('get_token', function (string $key): string {
                $token = $this->storedTokenReader->read($key);
                return $token->toString();
            })
        );

        return new TwigTemplateRenderer($twigEnvironment);
    }

}
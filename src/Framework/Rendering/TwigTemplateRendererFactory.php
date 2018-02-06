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
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

final class TwigTemplateRendererFactory
{
    private $templateDirectory;
    private $storedTokenReader;
    private $session;

    public function __construct(
        TemplateDirectory $templateDirectory,
        StoredTokenReader $storedTokenReader,
        Session $session
    )
    {
        $this->templateDirectory = $templateDirectory;
        $this->storedTokenReader = $storedTokenReader;
        $this->session = $session;
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

        $twigEnvironment->addFunction(
            new Twig_Function('get_flash_bag', function (): FlashBagInterface {
                return $this->session->getFlashBag(); })
        );

        return new TwigTemplateRenderer($twigEnvironment);
    }

}
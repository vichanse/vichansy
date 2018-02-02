<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 02/02/2018
 * Time: 05:20
 */

use Auryn\Injector;
use Vichansy\Framework\Rendering\TemplateRenderer;
use Vichansy\Framework\Rendering\TwigTemplateRendererFactory;
use Vichansy\Framework\Rendering\TemplateDirectory;

$injector = new Injector();



$injector->delegate(
    TemplateRenderer::class,
    function () use ($injector): TemplateRenderer {
        $factory = $injector->make(TwigTemplateRendererFactory::class);
        return $factory->create(); }
);

$injector->define(TemplateDirectory::class, [':rootDirectory' => ROOT_DIR]);

return $injector;
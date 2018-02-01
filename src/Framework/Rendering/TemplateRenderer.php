<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 01/02/2018
 * Time: 06:12
 */

namespace Vichansy\Framework\Rendering;

interface TemplateRenderer
{
    public function render(string $template, array $data = []): string;
}
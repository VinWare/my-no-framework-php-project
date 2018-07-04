<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 22:11
 */
declare(strict_types=1);

namespace Example\Template;

use Twig_Environment;

class TwigRenderer implements Renderer
{
    private $renderer;

    /**
     * TwigRenderer constructor.
     * @param $renderer
     */
    public function __construct(Twig_Environment $renderer)
    {
        $this->renderer = $renderer;
    }


    public function render($template, $data = []): string
    {
        return $this->renderer->render("$template.html", $data);
    }
}
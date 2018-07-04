<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 12:06
 */
declare(strict_types=1);

namespace Example\Template;

use Mustache_Engine;

class MustacheRenderer implements Renderer
{
    private $engine;

    /**
     * MustacheRenderer constructor.
     * @param $engine
     */
    public function __construct(Mustache_Engine $engine)
    {
        $this->engine = $engine;
    }


    public function render($template, $data = []): string
    {
        return $this->engine->render($template, $data);
    }
}
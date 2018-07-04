<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 11:45
 */
declare(strict_types=1);

namespace Example\Template;


interface Renderer
{
    public function render($template, $data = []) : string;
}
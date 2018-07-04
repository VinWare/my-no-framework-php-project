<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 22:39
 */
declare(strict_types=1);

namespace Example\Menu;


class ArrayMenuReader implements MenuReader
{
    public function readMenu(): array
    {
        return [
            ['href' => '/', 'text' => 'Home Page!']
        ];
    }
}
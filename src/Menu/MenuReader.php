<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 22:38
 */
declare(strict_types=1);

namespace Example\Menu;


interface MenuReader
{
    public function readMenu () : array;
}
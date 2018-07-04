<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 15:49
 */
declare(strict_types=1);

namespace Example\Page;


interface PageReader
{
    public function readBySlug(string $slug) : string;
}
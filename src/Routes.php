<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 03-07-2018
 * Time: 12:34
 */
declare(strict_types=1);

return  [
    ['GET', '/hello-world', ['Example\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['\Example\Controllers\Page', 'show']]
];
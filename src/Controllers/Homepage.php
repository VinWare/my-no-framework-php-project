<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 03-07-2018
 * Time: 17:40
 */
declare(strict_types=1);

namespace Example\Controllers;

use Http\Response;

class Homepage
{
    private $response ;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function show()
    {
        $this->response->setContent('Hello World!');
    }
}
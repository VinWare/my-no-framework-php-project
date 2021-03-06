<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 03-07-2018
 * Time: 17:40
 */
declare(strict_types=1);

namespace Example\Controllers;

use Example\Template\FrontendRenderer;
use Example\Template\Renderer;
use Http\Request;
use Http\Response;

class Homepage
{
    private $request ;
    private $response ;
    private $renderer ;

    public function __construct(Request $request, Response $response, FrontendRenderer $renderer)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
            'name' => $this->request->getParameter('name', 'stranger')
        ];
        $html = $this->renderer->render('Homepage', $data);
        $this->response->setContent($html);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 15:28
 */
declare(strict_types=1);

namespace Example\Controllers;


use Example\Page\InvalidPageException;
use Example\Page\PageReader;
use Example\Template\Renderer;
use Http\Response;

class Page
{
    private $response;
    private $renderer;
    private $pageReader;

    /**
     * Page constructor.
     * @param $response
     * @param $renderer
     * @param $pageReader
     */
    public function __construct(Response $response, Renderer $renderer, PageReader $pageReader)
    {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }


    public function show($params) {
        $slug = $params['slug'];
        try {
            $data['content'] = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $ie) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found');
        }
        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}
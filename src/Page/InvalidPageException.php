<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 17:06
 */
declare(strict_types=1);

namespace Example\Page;

use Exception;

class InvalidPageException extends Exception
{

    /**
     * InvalidPageException constructor.
     */
    public function __construct($slug, $code = 0, Exception $previous = null)
    {
        $message = "No page with the slug '$slug' was found";
        parent::__construct($message, $code, $previous);
    }
}
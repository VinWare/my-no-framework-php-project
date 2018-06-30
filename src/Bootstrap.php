<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 01-07-2018
 * Time: 01:01
 */
declare(strict_types=1);

namespace Example;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';
//$environment = 'production';

$whoops = new \Whoops\Run;
if($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function ($e){
        // TODO: Friendly error page and send email to developer
        echo 'TODO: Friendly error page and send email to developer';
    });
}

$whoops->register();

throw new \Exception;
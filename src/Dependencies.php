<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 00:26
 */

declare(strict_types=1);

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->alias('\Example\Template\Renderer', '\Example\Template\TwigRenderer');
$injector->define('Mustache_engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html'
        ]),
    ],
]);


$injector->alias('Example\Page\PageReader', 'Example\Page\FilePageReader');
$injector->define('Example\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->share('Example\Page\FilePageReader');

$injector->delegate('Twig_Environment', function () use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});

$injector->alias('Example\Template\FrontendRenderer', 'Example\Template\FrontendTwigRenderer');

$injector->alias('Example\Menu\MenuReader', 'Example\Menu\ArrayMenuReader');
$injector->share('Example\Menu\ArrayMenuReader');

return $injector;
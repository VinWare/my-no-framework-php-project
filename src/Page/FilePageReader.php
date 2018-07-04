<?php
/**
 * Created by PhpStorm.
 * User: Vineet
 * Date: 04-07-2018
 * Time: 15:51
 */
declare(strict_types=1);

namespace Example\Page;


class FilePageReader implements PageReader
{
    private $pageFolder;

    /**
     * FilePageReader constructor.
     * @param $pageFolder
     */
    public function __construct($pageFolder)
    {
        $this->pageFolder = $pageFolder;
    }

    public function readBySlug(string $slug): string
    {
        $path = "$this->pageFolder/$slug.md";

        if(!file_exists($path)) {
            throw new InvalidPageException($slug);
        }

        return file_get_contents($path);
    }
}
<?php

namespace App\Parser;

interface FetchInterface {
    /**
     * fetch site id by url
     *
     * @param  string $url
     * @return string
     */
    public function fetch(string $url):string;
}
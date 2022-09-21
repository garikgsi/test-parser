<?php

namespace App\Parser;

interface ParserInterface {
    /**
     * Count tags in text
     *
     * @param  mixed $text
     * @return array
     */
    public function calcTags(string $text):array;
}
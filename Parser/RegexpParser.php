<?php

namespace App\Parser;
use App\Parser\ParserInterface;

class RegexpParser implements ParserInterface {
    protected $lines = [];
    protected $tags = [];

    /**
     * split text on lines
     *
     * @param  mixed $text
     * @return void
     */
    protected function splitText(string $text) {
        $this->lines = explode(PHP_EOL, $text);
    }

    /**
     * calc tags based on regexp
     *
     * @param  mixed $text
     * @return array
     */
    public function calcTags(string $text):array {
        $this->splitText($text);

        foreach ($this->lines as $line) {
            preg_match("/<(([a-z]{1}[\w-]{1,})(\s{0,}[\w\'\"\.\:\/\=\s]+){0,})>/mi",$line,$matchedTags);
            if (isset($matchedTags[2])) {
                $tag = $matchedTags[2];
                if (isset($this->tags[$tag])) {
                    $this->tags[$tag]++;
                } else {
                    $this->tags[$tag] = 1;
                }
            }
        }
        return $this->tags;
    }
}
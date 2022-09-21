<?php

namespace App\Http\Controllers;

use App\Parser\CurlFetcher;
use App\Parser\Document;
use App\Parser\RegexpParser;
use Illuminate\Http\Request;


class HtmlParser extends Controller
{
    /**
     * return array tags on site page $request->url
     *
     * @param  mixed $request
     * @return void
     */
    public function parse(Request $request) {
        $fetcher = new CurlFetcher();
        $parser = new RegexpParser();
        $doc = new Document(url:$request->url?:'http://www.example.com/', fetcher:$fetcher, parser:$parser);
        return $doc->parse();
    }
}

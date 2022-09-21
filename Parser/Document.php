<?php
namespace App\Parser;

class Document {

    protected string $url;
    /**
     * fetcher
     *
     * @var mixed
     */
    protected $fetcher;
    protected $parser;
    protected $content;

    /**
     * __construct
     *
     * @param  mixed $url
     * @param  App\Parser\FetchInterface $fetcher
     * @param  App\Parser\ParserInterface $parser
     * @return void
     */
    public function __construct(string $url, FetchInterface $fetcher, ParserInterface $parser)
    {
        $this->url = $url;
        $this->fetcher = $fetcher;
        $this->parser = $parser;
        $this->getContent();
    }

    /**
     * fetch site
     *
     * @return void
     */
    public function getContent() {
        $this->content = $this->fetcher->fetch($this->url);
        return $this->content;
    }

    /**
     * parse tags
     *
     * @return void
     */
    public function parse() {
        return $this->parser->calcTags($this->content);
    }
}
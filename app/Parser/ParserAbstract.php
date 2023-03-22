<?php

namespace App\Parser;

use DOMDocument;
use PhpParser\Error;
use Psy\Exception\ParseErrorException;

abstract class ParserAbstract
{
    public function __construct(protected readonly DOMDocument $dom)
    {
    }

    protected function loadHtmlDom(string $url): void
    {
        libxml_use_internal_errors(true);
        if ($this->dom->loadHTML(file_get_contents($url))) {
            foreach (libxml_get_errors() as $error) {
                if ($error->level > 2) {
                    throw ParseErrorException::fromParseError(
                        new Error($error->message)
                    );
                }
            }
            libxml_clear_errors();
        }
        libxml_use_internal_errors(false);
    }
}

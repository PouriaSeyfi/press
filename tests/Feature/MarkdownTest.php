<?php


namespace pouria\Press\Tests\Feature;


use pouria\Press\MarkdownParser;
use pouria\Press\Tests\TestCase;

class MarkdownTest extends TestCase
{

    public function test_simple_markdown_is_parsed()
    {
        $this->assertEquals('<h1>Heading</h1>', MarkdownParser::parse('# Heading'));
    }
}
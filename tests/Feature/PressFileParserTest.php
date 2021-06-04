<?php


namespace pouria\Press\Tests\Feature;


use Orchestra\Testbench\TestCase;
use pouria\Press\PressFileParser;

class PressFileParserTest extends  TestCase
{

    public function test_head_and_body_gets_split()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));
        $data = $pressFileParser->getData();
        $this->assertStringContainsString('title: My Title',$data[1]);
        $this->assertStringContainsString('description: Description here',$data[1]);
        $this->assertStringContainsString('Blog post body here',$data[2]);
    }

}
<?php


namespace pouria\Press\Tests\Feature;


use Carbon\Carbon;
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

    public function test_each_head_field_gets_separated()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));
        $data = $pressFileParser->getData();
        $this->assertEquals('My Title',$data['title']);
        $this->assertEquals('Description here',$data['description']);
    }

    public function test_the_body_gets_saved_and_trimed()
    {
        $pressFileParser = new PressFileParser(__DIR__ . '/../blogs/MarkFile1.md');
        $data = $pressFileParser->getData();
        $this->assertEquals("<h1>Heading</h1>\n<p>Blog post body here</p>", $data['body']);
    }


    public function test_a_string_can_also_be_used_instead_file_path()
    {
        $pressFileParser = new PressFileParser("---\ntitle: my title\ndescription: my description\n---\n# Heading\n\nBlog post here");
        $data = $pressFileParser->getData();

        $this->assertStringContainsString('title: my title', $data[1]);
        $this->assertStringContainsString('description: my description', $data[1]);
        $this->assertStringContainsString('Blog post here', $data[2]);
    }


    public function test_a_date_get_field_parsed()
    {
        $pressFileParser = new PressFileParser("---\ndate: 14 May, 1998\n---");
        $data = $pressFileParser->getData();
        $this->assertInstanceOf(Carbon::class, $data['date']);
        $this->assertEquals('05/14/1998', $data['date']->format("m/d/Y"));
    }


}
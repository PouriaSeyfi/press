<?php


namespace pouria\Press\Fields;

use pouria\Press\MarkdownParser;

class Body extends FieldContract
{
    public static function process($type, $value, $data)
    {
        return [
            $type => MarkdownParser::parse($value)
        ];
    }

}
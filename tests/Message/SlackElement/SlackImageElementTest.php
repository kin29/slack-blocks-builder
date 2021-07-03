<?php

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use PHPUnit\Framework\TestCase;

class SlackImageElementTest extends TestCase
{
    public function test(): void
    {
        $expected = [
            "type" => "image",
            "image_url" => "http://placekitten.com/700/500",
            "alt_text" => "Multiple cute kittens",
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackImageElement())
                ->altText('Multiple cute kittens')
                ->imageUrl('http://placekitten.com/700/500')
        );
    }
}

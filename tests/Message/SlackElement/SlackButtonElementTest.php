<?php

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackMessage;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackButtonElementTest extends TestCase
{
    public function test(): void
    {
        $buttonElement = (new SlackButtonElement())
            ->text(
                (new SlackText())
                    ->type('plain_text')
                    ->text('Hi!')
                    ->emoji()
            );

        $expected = [
            "element" => [
                "type" => "button",
                "text" => [
                    "type" => "plain_text",
                    "text" => "Hi!",
                    "emoji" => true,
                ]
            ]
        ];


        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())->element($buttonElement)
        );
    }
}

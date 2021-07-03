<?php

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
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
                    ->text('Click Me')
            )
            ->value('click_me_123')
            ->actionId('button')
            ->style("primary")
            ->url("https://api.slack.com/block-kit")
        ;

        $expected = [
            "element" => [
                "type" => "button",
                "text" => [
                    "type" => "plain_text",
                    "text" => "Click Me",
                ],
                "action_id" => "button",
                "url" => "https://api.slack.com/block-kit",
                "value" => "click_me_123",
                "style" => "primary",
            ]
        ];


        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())->element($buttonElement)
        );
    }
}

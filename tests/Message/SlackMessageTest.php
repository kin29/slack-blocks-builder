<?php

namespace Kin29\SlackBlocksBuilder\Tests\Message;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackMessage;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackMessageTest extends TestCase
{
    public function testBuildMessage()
    {
        $block = (new SlackBlock())
            ->type('section')
            ->text(
                (new SlackText())
                    ->type('mrkdwn')
                    ->text('Hello!')
            );


        $expected = [
            "blocks" => [
                [
                    "type" => "section",
                    "text" => [
                        "type" => "mrkdwn",
                        "text" => "Hello!",
                    ]
                ],
                [
                    "type" => "section",
                    "text" => [
                        "type" => "mrkdwn",
                        "text" => "Hello!",
                    ]
                ]
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (new SlackMessage())->blocks([$block, $block])
        );
    }

    public function testBuildMessage2()
    {
        $blocks = [
            (new SlackBlock())
                ->type('section')
                ->text(
                    (new SlackText())
                        ->type('plain_text')
                        ->text('Hi!')
                        ->emoji()
                ),
            (new SlackBlock())
                ->type('divider'),
        ];

        $expected = [
            "blocks" => [
                [
                    "type" => "section",
                    "text" => [
                        "type" => "plain_text",
                        "text" => "Hi!",
                        "emoji" => true,
                    ]
                ],
                [
                    "type" => "divider",
                ]
            ]
        ];


        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (new SlackMessage())->blocks($blocks)
        );
    }
}

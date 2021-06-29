<?php

namespace Kin29\SlackBlocksBuilder\Message;

use PHPUnit\Framework\TestCase;

class SlackMessageTest extends TestCase
{
    public function testBuildMessage()
    {
        $text = (new SlackText())
            ->type('mrkdwn')
            ->text('Hello!');

        $block = (new SlackBlock())
            ->type('section')
            ->text($text);

        $message = new SlackMessage();
        $message->blocks([$block, $block]);

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
            (string)$message
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

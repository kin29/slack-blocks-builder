<?php

namespace SlackBlocksBuilder\Test\Message;

use SlackBlocksBuilder\Message\SlackBlock;
use SlackBlocksBuilder\Message\SlackMessage;
use PHPUnit\Framework\TestCase;
use SlackBlocksBuilder\Message\SlackText;

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
}

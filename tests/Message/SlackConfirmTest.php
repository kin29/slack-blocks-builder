<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackConfirmTest extends TestCase
{
    public function test(): void
    {
        $expected = [
            "title" => [
                "type" => "plain_text",
                "text" => "Are you sure?",
            ],
            "text" => [
                "type" => "mrkdwn",
                "text" => "Wouldn't you prefer a good game of _chess_?",
            ],
            "confirm" => [
                "type" => "plain_text",
                "text" => "Do it",
            ],
            "deny" => [
                "type" => "plain_text",
                "text" => "Stop, I've changed my mind!",
            ],
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackConfirm())
                ->title((new SlackText())
                    ->type('plain_text')
                    ->text('Are you sure?'))
                ->text((new SlackText())
                    ->type('mrkdwn')
                    ->text("Wouldn't you prefer a good game of _chess_?"))
                ->confirm((new SlackText())
                    ->type('plain_text')
                    ->text('Do it'))
                ->deny((new SlackText())
                    ->type('plain_text')
                    ->text("Stop, I've changed my mind!"))
        );
    }
}

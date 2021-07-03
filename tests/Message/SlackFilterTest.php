<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackDispatchActionConfiguration;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackPlainTextInputElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement\SlackConversationsList;
use Kin29\SlackBlocksBuilder\Message\SlackFilter;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackFilterTest extends TestCase
{
    public function test(): void
    {
        $expected = [
            "type" => "conversations_select",
            "filter" => [
                "include" => ["public", "mpim"],
                "exclude_bot_users" => true
            ],
            "placeholder" => [
                "type" => "plain_text",
                "text" => "This is a multiline plain-text input",
                "emoji" => true
            ],
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackConversationsList())
                ->placeholder((new SlackText())
                    ->type('plain_text')
                    ->text('This is a multiline plain-text input')
                    ->emoji())
                ->filter((new SlackFilter())
                    ->include(["public", "mpim"])
                    ->excludeBotUsers(true))
        );
    }
}

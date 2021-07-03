<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement\SlackMultiConversationsList;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackMultiConversationsListTest extends TestCase
{
    public function test(): void
    {
        $multiConversationsListElement = (new SlackMultiConversationsList())
            ->actionId('text1234')
            ->placeholder((new SlackText())->type('plain_text')->text('Select conversations'))
        ;

        $expected = [
            "type" => "section",
            "block_id" => "section678",
            "text" => [
                "type" => "mrkdwn",
                "text" => "Pick conversations from the list"
            ],
            "accessory" => [
                "type" => "multi_conversations_select",
                "placeholder" => [
                    "type" => "plain_text",
                    "text" => "Select conversations"
                ],
                "action_id" => "text1234",
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->blockId('section678')
                ->text((new SlackText())->type('mrkdwn')->text('Pick conversations from the list'))
                ->accessory($multiConversationsListElement)
        );
    }
}

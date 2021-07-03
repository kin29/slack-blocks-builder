<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement\SlackSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement\SlackConversationsList;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackConversationsListTest extends TestCase
{
    public function test(): void
    {
        $conversationsListElement = (new SlackConversationsList())
            ->actionId('text1234')
            ->placeholder((new SlackText())->type('plain_text')->text('Select an item'))
        ;

        $expected = [
            "type" => "section",
            "block_id" => "section678",
            "text" => [
                "type" => "mrkdwn",
                "text" => "Pick a conversation from the dropdown list"
            ],
            "accessory" => [
                "type" => "conversations_select",
                "placeholder" => [
                    "type" => "plain_text",
                    "text" => "Select an item"
                ],
                "action_id" => "text1234",
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->blockId('section678')
                ->text((new SlackText())->type('mrkdwn')->text('Pick a conversation from the dropdown list'))
                ->accessory($conversationsListElement)
        );
    }
}

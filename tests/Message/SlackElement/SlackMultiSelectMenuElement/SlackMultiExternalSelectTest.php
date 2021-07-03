<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement\SlackMultiExternalSelect;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackMultiExternalSelectTest extends TestCase
{
    public function test(): void
    {
        $multiEternalSelectElement = (new SlackMultiExternalSelect())
            ->actionId('text1234')
            ->placeholder((new SlackText())->type('plain_text')->text('Select items'))
            ->minQueryLength(3);

        $expected = [
            "type" => "section",
            "block_id" => "section678",
            "text" => [
                "type" => "mrkdwn",
                "text" => "Pick items from the list"
            ],
            "accessory" => [
                "type" => "multi_external_select",
                "min_query_length" => 3,
                "placeholder" => [
                    "type" => "plain_text",
                    "text" => "Select items"
                ],
                "action_id" => "text1234",
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->blockId('section678')
                ->text((new SlackText())->type('mrkdwn')->text('Pick items from the list'))
                ->accessory($multiEternalSelectElement)
        );
    }
}

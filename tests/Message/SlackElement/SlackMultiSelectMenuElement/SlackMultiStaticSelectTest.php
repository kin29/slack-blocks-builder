<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement\SlackMultiStaticSelect;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackMultiStaticSelectTest extends TestCase
{
    public function test(): void
    {
        $multiStaticElement = (new SlackMultiStaticSelect())
            ->actionId('text1234')
            ->placeholder((new SlackText())
                ->type('plain_text')
                ->text('Select items'))
            ->options([
                (new SlackOption())
                    ->text((new SlackText())->type('plain_text')->text('*this is plain_text text*'))
                    ->value('value-0'),
                (new SlackOption())
                    ->text((new SlackText())->type('plain_text')->text('*this is plain_text text*'))
                    ->value('value-1'),
                (new SlackOption())
                    ->text((new SlackText())->type('plain_text')->text('*this is plain_text text*'))
                    ->value('value-2'),
            ]);

        $expected = [
            "type" => "section",
            "block_id" => "section678",
            "text" => [
                "type" => "mrkdwn",
                "text" => "Pick items from the list"
            ],
            "accessory" => [
                "type" => "multi_static_select",
                "options" => [
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-0"
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-1"
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-2"
                    ],
                ],
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
                ->text((new SlackText())
                    ->type('mrkdwn')
                    ->text('Pick items from the list'))
                ->accessory($multiStaticElement)
        );
    }
}

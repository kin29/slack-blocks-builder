<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement\SlackSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement\SlackStaticSelect;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackStaticSelectTest extends TestCase
{
    public function test(): void
    {
        $staticElement = (new SlackStaticSelect())
            ->actionId('text1234')
            ->placeholder((new SlackText())
                ->type('plain_text')
                ->text('Select an item'))
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
                "text" => "Pick an item from the dropdown list"
            ],
            "accessory" => [
                "type" => "static_select",
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
                ->text((new SlackText())
                    ->type('mrkdwn')
                    ->text('Pick an item from the dropdown list'))
                ->accessory($staticElement)
        );
    }
}

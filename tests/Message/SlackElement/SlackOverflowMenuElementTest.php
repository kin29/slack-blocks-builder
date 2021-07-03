<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackOverflowMenuElement;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackOverflowMenuElementTest extends TestCase
{
    public function test(): void
    {
        $overFlowMenuElement = (new SlackOverflowMenuElement())
            ->actionId('overflow')
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
                (new SlackOption())
                    ->text((new SlackText())->type('plain_text')->text('*this is plain_text text*'))
                    ->value('value-3'),
                (new SlackOption())
                    ->text((new SlackText())->type('plain_text')->text('*this is plain_text text*'))
                    ->value('value-4'),
            ])
        ;

        $expected = [
            "type" => "section",
            "block_id" => "section 890",
            "text" => [
                "type" => "mrkdwn",
                "text" => "This is a section block with an overflow menu."
            ],
            "accessory" => [
                "type" => "overflow",
                "action_id" => "overflow",
                "options" => [
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-0",
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-1",
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-2",
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-3",
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "*this is plain_text text*"
                        ],
                        "value" => "value-4",
                    ],
                ],
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->blockId('section 890')
                ->text((new SlackText())->type('mrkdwn')->text('This is a section block with an overflow menu.'))
                ->accessory($overFlowMenuElement)
        );
    }
}

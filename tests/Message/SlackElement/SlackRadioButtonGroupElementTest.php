<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackRadioButtonGroupElement;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackRadioButtonGroupElementTest extends TestCase
{
    public function test(): void
    {
        $radioButtonGroupElement = (new SlackRadioButtonGroupElement())
            ->actionId('this_is_an_action_id')
            ->initialOption(
                (new SlackOption())
                    ->value('A1')
                    ->text((new SlackText())->type('plain_text')->text('Radio 1')))
            ->options([
                (new SlackOption())
                    ->value('A1')
                    ->text((new SlackText())->type('plain_text')->text('Radio 1')),
                (new SlackOption())
                    ->value('A2')
                    ->text((new SlackText())->type('plain_text')->text('Radio 2'))
            ])
        ;

        $expected = [
            "type" => "section",
            "text" => [
                "type" => "plain_text",
                "text" => "Check out these rad radio buttons"
            ],
            "accessory" => [
                "type" => "radio_buttons",
                "action_id" => "this_is_an_action_id",
                "options" => [
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "Radio 1"
                        ],
                        "value" => "A1",
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "Radio 2"
                        ],
                        "value" => "A2",
                    ],
                ],
                "initial_option" => [
                    "text" => [
                        "type" => "plain_text",
                        "text" => "Radio 1"
                    ],
                    "value" => "A1",
                ],
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->text((new SlackText())->type('plain_text')->text('Check out these rad radio buttons'))
                ->accessory($radioButtonGroupElement)
        );
    }
}

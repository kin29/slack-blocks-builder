<?php

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackCheckBoxGroupsTest extends TestCase
{
    public function test(): void
    {
        $checkboxElement = (new SlackCheckBoxGroups())
            ->actionId('this_is_an_action_id')
            ->initialOptions([
                (new SlackOption())
                    ->value('A1')
                    ->text(
                        (new SlackText())
                            ->type('plain_text')
                            ->text('Checkbox 1'))
            ])
            ->options([
                (new SlackOption())
                    ->value('A1')
                    ->text(
                        (new SlackText())
                            ->type('plain_text')
                            ->text('Checkbox 1')),
                (new SlackOption())
                    ->value('A2')
                    ->text(
                        (new SlackText())
                            ->type('plain_text')
                            ->text('Checkbox 2'))
            ]);

        $expected = [
            "type" => "section",
            "text" => [
                "type" => "plain_text",
                "text" => "Check out these charming checkboxes",
            ],
            "accessory" => [
                "type" => "checkboxes",
                "action_id" => "this_is_an_action_id",
                "options" => [
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "Checkbox 1",
                        ],
                        "value" => "A1",
                    ],
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "Checkbox 2",
                        ],
                        "value" => "A2",
                    ],
                ],
                "initial_options" => [
                    [
                        "text" => [
                            "type" => "plain_text",
                            "text" => "Checkbox 1",
                        ],
                        "value" => "A1",
                    ],
                ],
            ]
        ];


        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->text(
                    (new SlackText())
                        ->type('plain_text')
                        ->text('Check out these charming checkboxes'))
                ->accessory($checkboxElement)
            );
    }
}

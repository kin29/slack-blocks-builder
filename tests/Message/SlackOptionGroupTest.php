<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement\SlackStaticSelect;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackOptionGroup;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackOptionGroupTest extends TestCase
{
    public function test(): void
    {
        $expected = [
            "type" => "static_select",
            "option_groups" => [
                [
                    "label" => [
                        "type" => "plain_text",
                        "text" => "Group 1",
                    ],
                    "options" => [
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-0",
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-1",
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-2",
                        ],
                    ]
                ],
                [
                    "label" => [
                        "type" => "plain_text",
                        "text" => "Group 2",
                    ],
                    "options" => [
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-3",
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackStaticSelect())
                ->optionGroups([
                    (new SlackOptionGroup())
                        ->label((new SlackText())
                            ->type('plain_text')
                            ->text('Group 1'))
                        ->options([
                            (new SlackOption())
                                ->text((new SlackText())
                                    ->type('plain_text')
                                    ->text('*this is plain_text text*'))
                                ->value('value-0'),
                            (new SlackOption())
                                ->text((new SlackText())
                                    ->type('plain_text')
                                    ->text('*this is plain_text text*'))
                                ->value('value-1'),
                            (new SlackOption())
                                ->text((new SlackText())
                                    ->type('plain_text')
                                    ->text('*this is plain_text text*'))
                                ->value('value-2'),
                        ]),
                    (new SlackOptionGroup())
                        ->label((new SlackText())
                            ->type('plain_text')
                            ->text('Group 2'))
                        ->options([
                            (new SlackOption())
                                ->text((new SlackText())
                                    ->type('plain_text')
                                    ->text('*this is plain_text text*'))
                                ->value('value-3'),
                        ]),
                ])
        );
    }
}

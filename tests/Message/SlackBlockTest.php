<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackButtonElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackDatePickerElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackImageElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackOverflowMenuElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement\SlackStaticSelect;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackBlockTest extends TestCase
{
    public function test_action_block_with_select_menu_and_button(): void
    {
        $actionBlock = (new SlackBlock())
            ->type('actions')
            ->blockId('actions1')
            ->elements([
                (new SlackStaticSelect())
                    ->actionId('select_2')
                    ->placeholder(
                        (new SlackText())->type('plain_text')->text('Which witch is the witchiest witch?'))
                    ->options([
                        (new SlackOption())
                            ->value('matilda')
                            ->text((new SlackText())->type('plain_text')->text('Matilda')),
                        (new SlackOption())
                            ->value('glinda')
                            ->text((new SlackText())->type('plain_text')->text('Glinda')),
                        (new SlackOption())
                            ->value('grannyWeatherwax')
                            ->text((new SlackText())->type('plain_text')->text('Granny Weatherwax')),
                        (new SlackOption())
                            ->value('hermione')
                            ->text((new SlackText())->type('plain_text')->text('Hermione')),

                    ]),
                (new SlackButtonElement())
                    ->actionId('button_1')
                    ->text(
                        (new SlackText())->type('plain_text')->text('Cancel'))
                    ->value('cancel')
            ])
        ;

        $expected = [
            "type" => "actions",
            "elements" => [
                [
                    "type" => "static_select",
                    "options" => [
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "Matilda",
                            ],
                            "value" => "matilda"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "Glinda",
                            ],
                            "value" => "glinda"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "Granny Weatherwax",
                            ],
                            "value" => "grannyWeatherwax"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "Hermione",
                            ],
                            "value" => "hermione"
                        ],
                    ],
                    "placeholder" => [
                        "type" => "plain_text",
                        "text" => "Which witch is the witchiest witch?",
                    ],
                    "action_id" => "select_2",
                ],
                [
                    "type" => "button",
                    "text" => [
                        "type" => "plain_text",
                        "text" => "Cancel",
                    ],
                    "action_id" => "button_1",
                    "value" => "cancel",
                ]
            ],
            "block_id" => "actions1",
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)$actionBlock
        );
    }

    public function test_action_block_with_datepicker_and_overflow_and_button(): void
    {
        $actionBlock = (new SlackBlock())
            ->type('actions')
            ->elements([
                (new SlackDatePickerElement())
                    ->actionId('datepicker123')
                    ->initialDate('1990-04-28')
                    ->placeholder((new SlackText())->type('plain_text')->text('Select a date')),
                (new SlackOverflowMenuElement())
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
                    ]),
                (new SlackButtonElement())
                    ->text((new SlackText())->type('plain_text')->text('Click Me'))
                    ->value('click_me_123')
                    ->actionId('button'),
            ])
            ->blockId('actionblock789')
        ;

        $expected = [
            "type" => "actions",
            "elements" => [
                [
                    "type" => "datepicker",
                    "action_id" => "datepicker123",
                    "placeholder" => [
                        "type" => "plain_text",
                        "text" => "Select a date",
                    ],
                    "initial_date" => "1990-04-28",
                ],
                [
                    "type" => "overflow",
                    "options" => [
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-0"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-1"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-2"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-3"
                        ],
                        [
                            "text" => [
                                "type" => "plain_text",
                                "text" => "*this is plain_text text*",
                            ],
                            "value" => "value-4"
                        ],
                    ],
                ],
                [
                    "type" => "button",
                    "text" => [
                        "type" => "plain_text",
                        "text" => "Click Me",
                    ],
                    "action_id" => "button",
                    "value" => "click_me_123",
                ],
            ],
            "block_id" => "actionblock789",
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)$actionBlock
        );
    }

    public function test_context_block(): void
    {
        $contextBlock = (new SlackBlock())
            ->type('context')
            ->elements([
                (new SlackImageElement())
                    ->imageUrl('https://image.freepik.com/free-photo/red-drawing-pin_1156-445.jpg')
                    ->altText('images'),
                (new SlackText())->type('mkdwn')->text('Location: **Dogpatch**')
            ])
        ;

        $expected = [
            "type" => "context",
            "elements" => [
                [
                    "type" => "image",
                    "image_url" => "https://image.freepik.com/free-photo/red-drawing-pin_1156-445.jpg",
                    "alt_text" => "images"
                ],
                [
                    "type" => "mkdwn",
                    "text" => "Location: **Dogpatch**"
                ]
            ],
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)$contextBlock
        );
    }

    public function test_divider_block(): void
    {
        $expected = [
            "type" => "divider",
            "block_id" => "divider123",
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())->type('divider')->blockId('divider123')
        );
    }

    public function test_file_block(): void
    {
        $expected = [
            "type" => "file",
            "external_id" => "ABCD1",
            "source" => "remote",
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())->type('file')->externalId('ABCD1')->source('remote')
        );
    }
}

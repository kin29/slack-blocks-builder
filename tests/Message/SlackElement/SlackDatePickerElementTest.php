<?php

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackDatePickerElementTest extends TestCase
{
    public function test(): void
    {
        $datePickerElement = (new SlackDatePickerElement())
            ->actionId('datepicker123')
            ->initialDate("1990-04-28")
            ->placeholder(
                (new SlackText())
                    ->type('plain_text')
                    ->text('Select a date')
            )
        ;

        $expected = [
            "type" => "section",
            "block_id" => "section1234",
            "text" => [
                "type" => "mrkdwn",
                "text" => "Pick a date for the deadline.",
            ],
            "accessory" => [
                "type" => "datepicker",
                "action_id" => "datepicker123",
                "placeholder" => [
                    "type" => "plain_text",
                    "text" => "Select a date",
                ],
                "initial_date" => "1990-04-28",
            ]
        ];


        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->blockId('section1234')
                ->text(
                    (new SlackText())
                        ->type('mrkdwn')
                        ->text('Pick a date for the deadline.')
                )
                ->accessory($datePickerElement)
        );
    }
}

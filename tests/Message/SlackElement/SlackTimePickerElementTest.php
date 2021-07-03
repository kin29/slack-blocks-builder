<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackDatePickerElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackRadioButtonGroupElement;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackTimePickerElement;
use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackTimePickerElementTest extends TestCase
{
    public function test(): void
    {
        $datePickerElement = (new SlackTimePickerElement())
            ->actionId('timepicker123')
            ->placeholder((new SlackText())->type('plain_text')->text('Select a time'))
            ->initialTime('11:40')
        ;

        $expected = [
            "type" => "section",
            "block_id" => "section1234",
            "text" => [
                "type" => "mkdwn",
                "text" => "Pick a date for the deadline."
            ],
            "accessory" => [
                "type" => "timepicker",
                "action_id" => "timepicker123",
                "placeholder" => [
                    "type" => "plain_text",
                    "text" => "Select a time"
                ],
                "initial_time" => "11:40"
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('section')
                ->blockId('section1234')
                ->text((new SlackText())->type('mkdwn')->text('Pick a date for the deadline.'))
                ->accessory($datePickerElement)
        );
    }
}

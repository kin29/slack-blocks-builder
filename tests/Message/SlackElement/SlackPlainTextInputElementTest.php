<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackPlainTextInputElement;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackPlainTextInputElementTest extends TestCase
{
    public function test(): void
    {
        $plainTextInputElement = (new SlackPlainTextInputElement())
            ->actionId('plain_input')
            ->placeholder((new SlackText())->type('plain_text')->text('Enter some plain text'))
        ;

        $expected = [
            "type" => "input",
            "block_id" => "input123",
            "text" => [
                "type" => "plain_text",
                "text" => "Label of input"
            ],
            "element" => [
                "type" => "plain_text_input",
                "action_id" => "plain_input",
                "placeholder" => [
                    "type" => "plain_text",
                    "text" => "Enter some plain text"
                ],
            ]
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('input')
                ->blockId('input123')
                ->text((new SlackText())->type('plain_text')->text('Label of input'))
                ->element($plainTextInputElement)
        );
    }
}

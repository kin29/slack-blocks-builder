<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Tests\Message;

use Kin29\SlackBlocksBuilder\Message\SlackBlock;
use Kin29\SlackBlocksBuilder\Message\SlackDispatchActionConfiguration;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackPlainTextInputElement;
use Kin29\SlackBlocksBuilder\Message\SlackText;
use PHPUnit\Framework\TestCase;

class SlackDispatchActionConfigurationTest extends TestCase
{
    public function test(): void
    {
        $expected = [
            "type" => "input",
            "label" => [
                "type" => "plain_text",
                "text" => "This is a multiline plain-text input",
                "emoji" => true
            ],
            "element" => [
                "type" => "plain_text_input",
                "multiline" => true,
                "dispatch_action_config" => [
                    "trigger_actions_on" => ["on_character_entered"],
                ],
            ],
            "dispatch_action" => true,
        ];

        $this->assertEquals(
            json_encode($expected, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            (string)(new SlackBlock())
                ->type('input')
                ->dispatchAction(true)
                ->element((new SlackPlainTextInputElement())
                    ->multiline(true)
                    ->dispatchActionConfig((new SlackDispatchActionConfiguration())
                        ->triggerActionsOn(['on_character_entered'])))
                ->label((new SlackText())
                    ->type('plain_text')
                    ->text('This is a multiline plain-text input')
                    ->emoji())
        );
    }
}

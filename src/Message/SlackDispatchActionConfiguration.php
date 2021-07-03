<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

class SlackDispatchActionConfiguration extends AbstractSlackMessage
{
    /**
     * @var string[] "on_enter_pressed","on_character_entered"
     */
    protected array $trigger_actions_on;
}

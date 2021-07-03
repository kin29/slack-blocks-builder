<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\AbstractSlackMessage;
use Kin29\SlackBlocksBuilder\Message\SlackMessageInterface;

class SlackElement extends AbstractSlackMessage
{
    protected ?string $type = null;

    public function type(): SlackElement
    {
        return $this;
    }
}

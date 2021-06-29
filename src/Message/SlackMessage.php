<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

class SlackMessage extends AbstractSlackMessage
{
    /** @var SlackBlock[] */
    protected array $blocks = [];

    /**
     * @param SlackBlock[] $blocks
     * @return SlackMessageInterface
     */
    public function blocks(array $blocks): SlackMessageInterface
    {
        foreach ($blocks as $block) {
            if (!$block instanceof SlackBlock) {
                throw new \LogicException('Must hold only SlackBlock instances.');
            }

            $this->blocks[] = $block->payload();
        }

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace SlackBlocksBuilder\Message;

class SlackElement extends AbstractSlackMessage
{
    protected array $elements;

    /**
     * @param SlackElement[] $elements
     * @return SlackMessageInterface
     */
    public function elements(array $elements): SlackMessageInterface
    {
        foreach ($elements as $element) {
            if (!$element instanceof SlackElement) {
                throw new \LogicException('Must hold only SlackBlock instances.');
            }

            $this->$elements[] = $element->payload();
        }

        return $this;
    }
}

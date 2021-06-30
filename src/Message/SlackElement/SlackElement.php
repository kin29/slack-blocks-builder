<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\AbstractSlackMessage;
use Kin29\SlackBlocksBuilder\Message\SlackMessageInterface;

class SlackElement extends AbstractSlackMessage
{
    protected ?string $type = null;

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

            $this->elements[] = $element->payload();
        }

        return $this;
    }

    public function type(): SlackElement
    {
        return $this;
    }
}

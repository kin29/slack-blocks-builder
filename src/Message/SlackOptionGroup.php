<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

class SlackOptionGroup extends AbstractSlackMessage
{
    protected array $label;

    protected array $options;

    /**
     * @param SlackText $label
     * @return SlackOptionGroup
     */
    public function label(SlackText $label): SlackOptionGroup
    {
        $this->label = $label->payload();
        return $this;
    }

    /**
     * @param SlackOption[] $options
     * @return SlackOptionGroup
     */
    public function options(array $options): SlackOptionGroup
    {
        foreach ($options as $option) {
            if (!$option instanceof SlackOption) {
                throw new \LogicException('Must hold only SlackOption instances.');
            }

            $this->options[] = $option->payload();
        }

        return $this;
    }
}

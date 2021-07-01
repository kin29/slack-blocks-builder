<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackOption;
use Kin29\SlackBlocksBuilder\Message\SlackOptionGroup;

class SlackMultiStaticSelect extends SlackSelectMenuElement
{
    protected ?string $type = 'multi_static_select';

    protected array $options;

    protected array $option_groups;

    protected array $initial_options;

    /**
     * @param SlackOption[] $options
     * @return SlackStaticSelect
     */
    public function options(array $options): SlackStaticSelect
    {
        foreach ($options as $option) {
            if (!$option instanceof SlackOption) {
                throw new \LogicException('Must hold only SlackOption instances.');
            }

            $this->options[] = $option->payload();
        }

        return $this;
    }

    /**
     * @param SlackOptionGroup[] $optionGroups
     * @return SlackStaticSelect
     */
    public function optionGroups(array $optionGroups): SlackStaticSelect
    {
        foreach ($optionGroups as $optionGroup) {
            if (!$optionGroup instanceof SlackOptionGroup) {
                throw new \LogicException('Must hold only SlackOptionGroup instances.');
            }

            $this->option_groups[] = $optionGroup->payload();
        }

        return $this;
    }

    /**
     * @param SlackOption[] $initialOptions
     * @return SlackStaticSelect
     */
    public function initialOptions(array $initialOptions): SlackStaticSelect
    {
        foreach ($initialOptions as $initialOption) {
            if (!$initialOption instanceof SlackOption) {
                throw new \LogicException('Must hold only SlackOption instances.');
            }

            $this->initial_options[] = $initialOption->payload();
        }

        return $this;
    }
}

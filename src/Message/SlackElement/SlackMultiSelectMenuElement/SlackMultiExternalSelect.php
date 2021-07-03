<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackOption;

class SlackMultiExternalSelect extends SlackMultiSelectMenuElement
{
    protected ?string $type = 'multi_external_select';

    protected int $min_query_length;

    /**
     * @param int $min_query_length
     * @return SlackMultiExternalSelect
     */
    public function minQueryLength(int $min_query_length): SlackMultiExternalSelect
    {
        $this->min_query_length = $min_query_length;
        return $this;
    }

    protected array $initial_options;

    /**
     * @param SlackOption[] $initialOptions
     * @return SlackMultiExternalSelect
     */
    public function initialOptions(array $initialOptions): SlackMultiExternalSelect
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

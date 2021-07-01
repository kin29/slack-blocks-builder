<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackOption;

class SlackExternalSelect extends SlackSelectMenuElement
{
    protected ?string $type = 'external_select';

    protected array $initial_options;

    protected int $min_query_length;

    /**
     * @param int $min_query_length
     * @return SlackExternalSelect
     */
    public function minQueryLength(int $min_query_length): SlackExternalSelect
    {
        $this->min_query_length = $min_query_length;
        return $this;
    }

    /**
     * @param SlackOption[] $initialOptions
     * @return SlackExternalSelect
     */
    public function initialOptions(array $initialOptions): SlackExternalSelect
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

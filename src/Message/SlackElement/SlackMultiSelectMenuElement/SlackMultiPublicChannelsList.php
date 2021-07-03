<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement;

class SlackMultiPublicChannelsList extends SlackMultiSelectMenuElement
{
    protected ?string $type = 'multi_channels_select';

    /**
     * @var string[]
     */
    protected array $initial_channels;

    /**
     * @param string[] $initial_channels
     * @return SlackMultiPublicChannelsList
     */
    public function initialChannels(array $initial_channels): SlackMultiPublicChannelsList
    {
        $this->initial_channels = $initial_channels;
        return $this;
    }
}

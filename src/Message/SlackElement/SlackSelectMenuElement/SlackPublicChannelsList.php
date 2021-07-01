<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackPublicChannelsList extends SlackSelectMenuElement
{
    protected ?string $type = 'channels_select';

    protected string $initial_channel;

    protected bool $response_url_enabled;

    /**
     * @param string $initial_channel
     * @return SlackPublicChannelsList
     */
    public function initialChannels(string $initial_channel): SlackPublicChannelsList
    {
        $this->initial_channel = $initial_channel;
        return $this;
    }

    /**
     * @param bool $response_url_enabled
     * @return SlackPublicChannelsList
     */
    public function responseUrlEnabled(bool $response_url_enabled): SlackPublicChannelsList
    {
        $this->response_url_enabled = $response_url_enabled;
        return $this;
    }
}

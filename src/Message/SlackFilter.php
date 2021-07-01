<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

class SlackFilter extends AbstractSlackMessage
{
    /**
     * @var string[]
     */
    protected array $include;

    protected bool $exclude_external_shared_channels;

    protected bool $exclude_bot_users;

    /**
     * @param string[] $include
     * @return SlackFilter
     */
    public function include(array $include): SlackFilter
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @param bool $exclude_external_shared_channels
     * @return SlackFilter
     */
    public function excludeExternalSharedChannels(bool $exclude_external_shared_channels): SlackFilter
    {
        $this->exclude_external_shared_channels = $exclude_external_shared_channels;
        return $this;
    }

    /**
     * @param bool $exclude_bot_users
     * @return SlackFilter
     */
    public function excludeBotUsers(bool $exclude_bot_users): SlackFilter
    {
        $this->exclude_bot_users = $exclude_bot_users;
        return $this;
    }
}

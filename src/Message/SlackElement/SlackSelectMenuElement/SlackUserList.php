<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement;

class SlackUserList extends SlackSelectMenuElement
{
    protected ?string $type = 'users_select';

    /**
     * @var string[]
     */
    protected array $initial_users;

    /**
     * @param string[] $initial_users
     * @return SlackUserList
     */
    public function initialUsers(array $initial_users): SlackUserList
    {
        $this->initial_users = $initial_users;
        return $this;
    }
}

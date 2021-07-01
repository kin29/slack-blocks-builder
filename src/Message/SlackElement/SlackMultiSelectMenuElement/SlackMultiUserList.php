<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement;

class SlackMultiUserList extends SlackSelectMenuElement
{
    protected ?string $type = 'multi_users_select';

    /**
     * @var string[]
     */
    protected array $initial_users;

    /**
     * @param string[] $initial_users
     * @return SlackMultiUserList
     */
    public function initialUsers(array $initial_users): SlackMultiUserList
    {
        $this->initial_users = $initial_users;
        return $this;
    }
}

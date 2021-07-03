<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackFilter;

class SlackMultiConversationsList extends SlackMultiSelectMenuElement
{
    protected ?string $type = 'multi_conversations_select';

    /**
     * @var string[]
     */
    protected array $initial_conversations;

    protected bool $default_to_current_conversation = false;

    protected array $filter;


    /**
     * @param string[] $initial_conversations
     * @return SlackMultiConversationsList
     */
    public function initialConversations(array $initial_conversations): SlackMultiConversationsList
    {
        $this->initial_conversations = $initial_conversations;
        return $this;
    }

    /**
     * @param bool $default_to_current_conversation
     * @return SlackMultiConversationsList
     */
    public function defaultToCurrentConversation(bool $default_to_current_conversation): SlackMultiConversationsList
    {
        $this->default_to_current_conversation = $default_to_current_conversation;
        return $this;
    }

    /**
     * @param SlackFilter $filter
     * @return SlackMultiConversationsList
     */
    public function filter(SlackFilter $filter): SlackMultiConversationsList
    {
        $this->filter = $filter->payload();
        return $this;
    }
}

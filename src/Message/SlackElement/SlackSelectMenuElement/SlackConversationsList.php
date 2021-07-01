<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackFilter;

class SlackConversationsList extends SlackSelectMenuElement
{
    protected ?string $type = 'conversations_select';

    /**
     * @var string[]
     */
    protected array $initial_conversations;

    protected bool $default_to_current_conversation = false;

    protected array $filter;

    protected bool $response_url_enabled;


    /**
     * @param string[] $initial_conversations
     * @return SlackConversationsList
     */
    public function initialConversations(array $initial_conversations): SlackConversationsList
    {
        $this->initial_conversations = $initial_conversations;
        return $this;
    }

    /**
     * @param bool $default_to_current_conversation
     * @return SlackConversationsList
     */
    public function defaultToCurrentConversation(bool $default_to_current_conversation): SlackConversationsList
    {
        $this->default_to_current_conversation = $default_to_current_conversation;
        return $this;
    }

    /**
     * @param SlackFilter $filter
     * @return SlackConversationsList
     */
    public function filter(SlackFilter $filter): SlackConversationsList
    {
        $this->filter = $filter->payload();
        return $this;
    }

    /**
     * @param bool $response_url_enabled
     * @return SlackConversationsList
     */
    public function responseUrlEnabled(bool $response_url_enabled): SlackConversationsList
    {
        $this->response_url_enabled = $response_url_enabled;
        return $this;
    }
}

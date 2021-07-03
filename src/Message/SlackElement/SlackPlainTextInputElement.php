<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackDispatchActionConfiguration;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackPlainTextInputElement extends SlackElement
{
    protected ?string $type = 'plain_text_input';

    protected string $action_id;

    protected array $placeholder;

    protected string $initial_value;

    protected bool $multiline;

    protected int $min_length;

    protected int $max_length;

    protected array $dispatch_action_config;

    /**
     * @param string $action_id
     * @return SlackPlainTextInputElement
     */
    public function actionId(string $action_id): SlackPlainTextInputElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackText $placeholder
     * @return SlackPlainTextInputElement
     */
    public function placeholder(SlackText $placeholder): SlackPlainTextInputElement
    {
        $this->placeholder = $placeholder->payload();
        return $this;
    }

    /**
     * @param string $initial_value
     * @return SlackPlainTextInputElement
     */
    public function initialValue(string $initial_value): SlackPlainTextInputElement
    {
        $this->initial_value = $initial_value;
        return $this;
    }

    /**
     * @param bool $multiline
     * @return SlackPlainTextInputElement
     */
    public function multiline(bool $multiline): SlackPlainTextInputElement
    {
        $this->multiline = $multiline;
        return $this;
    }

    /**
     * @param int $min_length
     * @return SlackPlainTextInputElement
     */
    public function minLength(int $min_length): SlackPlainTextInputElement
    {
        $this->min_length = $min_length;
        return $this;
    }

    /**
     * @param int $max_length
     * @return SlackPlainTextInputElement
     */
    public function maxLength(int $max_length): SlackPlainTextInputElement
    {
        $this->max_length = $max_length;
        return $this;
    }

    /**
     * @param SlackDispatchActionConfiguration $dispatch_action_config
     * @return SlackPlainTextInputElement
     */
    public function dispatchActionConfig(SlackDispatchActionConfiguration $dispatch_action_config): SlackPlainTextInputElement
    {
        $this->dispatch_action_config = $dispatch_action_config->payload();
        return $this;
    }
}

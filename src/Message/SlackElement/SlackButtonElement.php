<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackButtonElement extends SlackElement
{
    protected ?string $type = 'button';

    protected array $text;

    protected string $action_id;

    protected string $url;

    protected string $value;

    protected string $style;

    protected array $confirm;

    /**
     * @param SlackText $text
     * @return SlackButtonElement
     */
    public function text(SlackText $text): SlackButtonElement
    {
        $this->text = $text->payload();
        return $this;
    }

    /**
     * @param string $action_id
     * @return SlackButtonElement
     */
    public function actionId(string $action_id): SlackButtonElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param string $url
     * @return SlackButtonElement
     */
    public function url(string $url): SlackButtonElement
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $value
     * @return SlackButtonElement
     */
    public function value(string $value): SlackButtonElement
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $style
     * @return SlackButtonElement
     */
    public function style(string $style): SlackButtonElement
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @param SlackConfirm $confirm
     * @return SlackButtonElement
     */
    public function confirm(SlackConfirm $confirm): SlackButtonElement
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

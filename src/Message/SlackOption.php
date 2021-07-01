<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

class SlackOption extends AbstractSlackMessage
{
    protected array $text;

    protected string $value;

    protected array $description;

    protected string $url;

    /**
     * @param SlackText $text
     * @return SlackOption
     */
    public function text(SlackText $text): SlackOption
    {
        $this->text = $text->payload();
        return $this;
    }

    /**
     * @param string $value
     * @return SlackOption
     */
    public function value(string $value): SlackOption
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param SlackText $description
     * @return SlackOption
     */
    public function description(SlackText $description): SlackOption
    {
        $this->description = $description->payload();
        return $this;
    }

    /**
     * @param string $url
     * @return SlackOption
     */
    public function url(string $url): SlackOption
    {
        $this->url = $url;
        return $this;
    }
}

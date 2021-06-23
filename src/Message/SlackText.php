<?php

declare(strict_types=1);

namespace SlackBlocksBuilder\Message;

class SlackText extends AbstractSlackMessage
{
    /**
     * @var string
     * @required
     */
    protected string $type;

    /**
     * @var string
     * @required
     */
    protected string $text;

    /**
     * @var bool
     */
    protected bool $emoji;

    /**
     * @var bool
     */
    protected bool $verbatim;

    /**
     * @param string $type
     * @return SlackText
     */
    public function type(string $type): SlackText
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $text
     * @return SlackText
     */
    public function text(string $text): SlackText
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param bool $emoji
     * @return SlackText
     */
    public function emoji(bool $emoji): SlackText
    {
        $this->emoji = $emoji;
        return $this;
    }

    /**
     * @param bool $verbatim
     * @return SlackText
     */
    public function verbatim(bool $verbatim): SlackText
    {
        $this->verbatim = $verbatim;
        return $this;
    }
}

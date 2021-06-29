<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

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
     * @return SlackText
     */
    public function emoji(): SlackText
    {
        $this->emoji = true;
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

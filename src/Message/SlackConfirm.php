<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

class SlackConfirm extends AbstractSlackMessage
{
    protected array $title;
    protected array $text;
    protected array $confirm;
    protected array $deny;
    protected string $style;

    /**
     * @param SlackText $title
     * @return SlackConfirm
     */
    public function title(SlackText $title): SlackConfirm
    {
        $this->title = $title->payload();
        return $this;
    }

    /**
     * @param SlackText $text
     * @return SlackConfirm
     */
    public function text(SlackText $text): SlackConfirm
    {
        $this->text = $text->payload();
        return $this;
    }

    /**
     * @param SlackText $confirm
     * @return SlackConfirm
     */
    public function confirm(SlackText $confirm): SlackConfirm
    {
        $this->confirm = $confirm->payload();
        return $this;
    }

    /**
     * @param SlackText $deny
     * @return SlackConfirm
     */
    public function deny(SlackText $deny): SlackConfirm
    {
        $this->deny = $deny->payload();
        return $this;
    }

    /**
     * @param string $style
     * @return SlackConfirm
     */
    public function style(string $style): SlackConfirm
    {
        $this->style = $style;
        return $this;
    }
}

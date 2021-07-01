<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackElement;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackSelectMenuElement extends SlackElement
{
    protected array $placeholder;

    protected string $action_id;

    protected array $confirm;

    /**
     * @param SlackText $placeholder
     * @return SlackSelectMenuElement
     */
    public function placeholder(SlackText $placeholder): SlackSelectMenuElement
    {
        $this->placeholder = $placeholder->payload();
        return $this;
    }

    /**
     * @param string $action_id
     * @return SlackSelectMenuElement
     */
    public function actionId(string $action_id): SlackSelectMenuElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackConfirm $confirm
     * @return SlackSelectMenuElement
     */
    public function confirm(SlackConfirm $confirm): SlackSelectMenuElement
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

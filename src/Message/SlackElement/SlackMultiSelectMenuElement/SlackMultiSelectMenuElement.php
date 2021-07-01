<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement\SlackMultiSelectMenuElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackElement;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackMultiSelectMenuElement extends SlackElement
{
    protected array $placeholder;

    protected string $action_id;

    protected array $confirm;

    protected int $max_selected_items;

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

    /**
     * @param int $max_selected_items
     * @return SlackSelectMenuElement
     */
    public function maxSelectedItems(int $max_selected_items): SlackSelectMenuElement
    {
        $this->max_selected_items = $max_selected_items;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackTimePickerElement extends SlackElement
{
    protected ?string $type = 'timepicker';

    protected string $action_id;

    protected array $placeholder;

    protected string $initial_time;

    protected array $confirm;

    /**
     * @param string $action_id
     * @return SlackTimePickerElement
     */
    public function actionId(string $action_id): SlackTimePickerElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackText $placeholder
     * @return SlackTimePickerElement
     */
    public function placeholder(SlackText $placeholder): SlackTimePickerElement
    {
        $this->placeholder = $placeholder->payload();
        return $this;
    }

    /**
     * @param string $initial_time
     * @return SlackTimePickerElement
     */
    public function initialTime(string $initial_time): SlackTimePickerElement
    {
        $this->initial_time = $initial_time;
        return $this;
    }

    /**
     * @param SlackConfirm $confirm
     * @return SlackTimePickerElement
     */
    public function confirm(SlackConfirm $confirm): SlackTimePickerElement
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

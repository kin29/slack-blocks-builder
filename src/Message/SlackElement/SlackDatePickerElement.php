<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackText;

class SlackDatePickerElement extends SlackElement
{
    protected ?string $type = 'datepicker';

    protected string $action_id;

    protected array $placeholder;

    protected string $initial_date;

    protected array $confirm;

    /**
     * @param string $action_id
     * @return SlackDatePickerElement
     */
    public function actionId(string $action_id): SlackDatePickerElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackText $placeholder
     * @return SlackDatePickerElement
     */
    public function placeholder(SlackText $placeholder): SlackDatePickerElement
    {
        $this->placeholder = $placeholder->payload();
        return $this;
    }

    /**
     * @param string $initial_date
     * @return SlackDatePickerElement
     */
    public function initialDate(string $initial_date): SlackDatePickerElement
    {
        $this->initial_date = $initial_date;
        return $this;
    }

    /**
     * @param SlackConfirm $confirm
     * @return SlackDatePickerElement
     */
    public function confirm(SlackConfirm $confirm): SlackDatePickerElement
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

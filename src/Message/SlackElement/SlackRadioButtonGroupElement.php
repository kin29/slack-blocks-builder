<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackOption;

class SlackRadioButtonGroupElement extends SlackElement
{
    protected ?string $type = 'radio_buttons';

    protected string $action_id;

    protected array $options;

    protected array $initial_option;

    protected array $confirm;

    /**
     * @param string $action_id
     * @return SlackRadioButtonGroupElement
     */
    public function actionId(string $action_id): SlackRadioButtonGroupElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackOption[] $options
     * @return SlackRadioButtonGroupElement
     */
    public function options(array $options): SlackRadioButtonGroupElement
    {
        foreach ($options as $option) {
            if (!$option instanceof SlackOption) {
                throw new \LogicException('Must hold only SlackOption instances.');
            }

            $this->options[] = $option->payload();
        }

        return $this;
    }

    /**
     * @param SlackOption $initial_option
     * @return SlackRadioButtonGroupElement
     */
    public function initialOption(SlackOption $initial_option): SlackRadioButtonGroupElement
    {
        $this->initial_option = $initial_option->payload();
        return $this;
    }

    /**
     * @param SlackConfirm $confirm
     * @return SlackRadioButtonGroupElement
     */
    public function confirm(SlackConfirm $confirm): SlackRadioButtonGroupElement
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

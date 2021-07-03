<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackOption;

class SlackCheckBoxGroups extends SlackElement
{
    protected ?string $type = 'checkboxes';

    protected string $action_id;

    protected array $options;

    protected array $initial_options;

    protected array $confirm;

    /**
     * @param string $action_id
     * @return SlackCheckBoxGroups
     */
    public function actionId(string $action_id): SlackCheckBoxGroups
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackOption[] $options
     * @return SlackCheckBoxGroups
     */
    public function options(array $options): SlackCheckBoxGroups
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
     * @param SlackOption[] $initialOptions
     * @return SlackCheckBoxGroups
     */
    public function initialOptions(array $initialOptions): SlackCheckBoxGroups
    {
        foreach ($initialOptions as $initialOption) {
            if (!$initialOption instanceof SlackOption) {
                throw new \LogicException('Must hold only SlackOption instances.');
            }

            $this->initial_options[] = $initialOption->payload();
        }

        return $this;
    }

    /**
     * @param SlackConfirm $confirm
     * @return SlackCheckBoxGroups
     */
    public function confirm(SlackConfirm $confirm): SlackCheckBoxGroups
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

use Kin29\SlackBlocksBuilder\Message\SlackConfirm;
use Kin29\SlackBlocksBuilder\Message\SlackOption;

class SlackOverflowMenuElement extends SlackElement
{
    protected ?string $type = 'overflow';

    protected string $action_id;

    protected array $options;

    protected array $confirm;

    /**
     * @param string $action_id
     * @return SlackOverflowMenuElement
     */
    public function actionId(string $action_id): SlackOverflowMenuElement
    {
        $this->action_id = $action_id;
        return $this;
    }

    /**
     * @param SlackOption[] $options
     * @return SlackOverflowMenuElement
     */
    public function options(array $options): SlackOverflowMenuElement
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
     * @param SlackConfirm $confirm
     * @return SlackOverflowMenuElement
     */
    public function confirm(SlackConfirm $confirm): SlackOverflowMenuElement
    {
        $this->confirm = $confirm->payload();
        return $this;
    }
}

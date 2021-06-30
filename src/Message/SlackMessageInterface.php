<?php

namespace Kin29\SlackBlocksBuilder\Message;

interface SlackMessageInterface
{
    /**
     * @return array
     */
    public function payload(): array;
}

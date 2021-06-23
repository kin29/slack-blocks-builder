<?php

namespace SlackBlocksBuilder\Message;

interface SlackMessageInterface
{
    /**
     * @return array
     */
    public function payload(): array;
}

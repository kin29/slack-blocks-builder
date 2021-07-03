<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message\SlackElement;

class SlackImageElement extends SlackElement
{
    protected ?string $type = 'image';

    protected string $image_url;

    protected string $alt_text;

    /**
     * @param string $image_url
     * @return SlackImageElement
     */
    public function imageUrl(string $image_url): SlackImageElement
    {
        $this->image_url = $image_url;
        return $this;
    }

    /**
     * @param string $alt_text
     * @return SlackImageElement
     */
    public function altText(string $alt_text): SlackImageElement
    {
        $this->alt_text = $alt_text;
        return $this;
    }
}
